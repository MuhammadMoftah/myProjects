<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

use App\Certificate;

class CertificateController extends Controller
{
    protected $certificate_model;
    protected $request;

    public function __construct(Certificate $certificate_model, Request $request)
    {
        $this->request = $request;
        $this->certificate_model = $certificate_model;
    }

    public function getCreate($user_id, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);
        return view('admin.pages.users.certificates.create', compact('user'));
    }

    public function postCreate($user_id, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);

        $this->validate($this->request, $this->certificate_model->getCreateAndUpdateRules());

        $this->certificate_model->create([
            'name' => $this->request->name,
            'place_name' => $this->request->place_name,
            'member_id' => $this->request->member_id,
            'date' => $this->request->date,
            'expired_date' => $this->request->expired_date,
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.users.view', $user->id)->withMessage('certificate created successfully!');
    }

    public function delete($id)
    {
        $certificate = $this->certificate_model->findOrFail($id);
        return $certificate->delete() ? back()->withMessage('certificate has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $certificate = $this->certificate_model->findOrFail($id);
        return view('admin.pages.users.certificates.view', compact('certificate'));
    }

    public function getEdit($id)
    {
        $certificate = $this->certificate_model->findOrFail($id);
        return view('admin.pages.users.certificates.edit', compact('certificate'));
    }

    public function postEdit($id)
    {
        $certificate = $this->certificate_model->findOrFail($id);
        $this->validate($this->request, $this->certificate_model->getCreateAndUpdateRules());

        $certificate->update([
            'name' => $this->request->name,
            'place_name' => $this->request->place_name,
            'member_id' => $this->request->member_id,
            'date' => $this->request->date,
            'expired_date' => $this->request->expired_date,
        ]);

        return redirect()->route('admin.users.view', $certificate->user_id)->withMessage('certificate updated successfully!');
    }
}
