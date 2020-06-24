<?php

namespace App\Http\Controllers\admin;

use App\Country;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImporDeletet;
use App\Imports\UsersImport;
use App\Nationality;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    protected $user_model;
    protected $request;

    public function __construct(User $user_model, Request $request)
    {
        $this->request = $request;
        $this->user_model = $user_model;
    }

    public function getAll()
    {
        $users = $this->user_model->latest()->paginate(10);
        return view('admin.pages.users.all', compact('users'));
    }

    public function getCreate(Country $country_model, Nationality $nationality_model)
    {
        $countries = $country_model->get();
        $nationalities = $nationality_model->get();
        return view('admin.pages.users.create', compact('countries', 'nationalities'));
    }

    public function postCreate()
    {
        $this->validate($this->request, $this->user_model->getCreateRules());

        // upload user image
        if ($this->request->hasFile('image')) {
            $this->validate($this->request, $this->user_model->validate_image());
            $imageName = $this->user_model->uploadUserImage($this->request->image);
        }

        // upload cv
        if ($this->request->hasFile('cv')) {
            $cv_name = $this->user_model->uploadUserCv($this->request->cv);
        }

        // upload video cv
        if ($this->request->hasFile('video_cv')) {
            $this->validate($this->request, $this->user_model->validate_video_cv());
            $video_name = $this->user_model->uploadVideoCv($this->request->video_cv);
        }

        $this->user_model->create([
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            'title' => $this->request->title,
            'email' => $this->request->email,
            'password' => bcrypt($this->request->password),
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'nationality_id' => $this->request->nationality_id,
            'phone' => $this->request->phone,
            'cv' => $cv_name,
            'verified' => isset($this->request->verified) ? 1 : 0,
            'image' => isset($imageName) ? $imageName : 'user.png',
            'video_cv' => isset($video_name) ? $video_name : null,
            'subscription' => isset($this->request->subscription) ? 1 : 0,
            'birth_date' => $this->request->birth_date,
            'gender' => $this->request->gender,
        ]);

        return redirect()->route('admin.users')->withMessage('user created successfully!');
    }

    public function suspend($id)
    {
        $user = $this->user_model->findOrFail($id);
        $user->suspend == 0 ? $user->update(['suspend' => 1]) : $user->update(['suspend' => 0]);
        return $user->suspend == 0 ? back()->withMessage('user has been activated') : back()->withMessage('user has been suspended');
    }

    public function getView($id)
    {
        $user = $this->user_model->findOrFail($id);
        return view('admin.pages.users.view', compact('user'));
    }

    public function getEdit($id, Country $country_model, Nationality $nationality_model)
    {
        $user = $this->user_model->findOrFail($id);
        $countries = $country_model->get();
        $nationalities = $nationality_model->get();
        $cities = [];
        if ($user->country_id) {
            $cities = $user->country->cities;
        }
        return view('admin.pages.users.edit', compact('user', 'countries', 'cities', 'nationalities'));
    }

    public function postEdit($id)
    {
        $user = $this->user_model->findOrFail($id);
        $this->validate($this->request, $this->user_model->getUpdateRules($user->id, true));

        if (isset($this->request->ref1_name) || isset($this->request->ref1_phone) || isset($this->request->ref1_title)) {
            $this->validate($this->request, $this->user_model->validateRef1());
        }

        if (isset($this->request->ref2_name) || isset($this->request->ref2_phone) || isset($this->request->ref2_title)) {
            $this->validate($this->request, $this->user_model->validateRef2());
        }

        $user->update([
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            'title' => $this->request->title,
            'email' => $this->request->email,
            'country_id' => $this->request->country_id,
            'city_id' => $this->request->city_id,
            'nationality_id' => $this->request->nationality_id,
            'phone' => $this->request->phone,
            'verified' => isset($this->request->verified) ? 1 : 0,
            'subscription' => isset($this->request->subscription) ? 1 : 0,
            'birth_date' => $this->request->birth_date,
            'gender' => $this->request->gender,
            'ref1_name' => $this->request->ref1_name,
            'ref1_phone' => $this->request->ref1_phone,
            'ref1_title' => $this->request->ref1_title,
            'ref2_name' => $this->request->ref2_name,
            'ref2_phone' => $this->request->ref2_phone,
            'ref2_title' => $this->request->ref2_title,
        ]);

        if (isset($this->request->password)) {
            $this->validate($this->request, $this->user_model->password_validate());
            $user->update(['password' => bcrypt($this->request->password)]);
        }

        // upload user image
        if ($this->request->hasFile('image')) {
            $this->validate($this->request, $this->user_model->validate_image());
            $imageName = $user->uploadUserImage($this->request->image);
            $user->deleteUserImage();
            $user->update([
                'image' => $imageName,
            ]);
        }

        // upload cv
        if ($this->request->hasFile('cv')) {
            $this->validate($this->request, $this->user_model->validate_cv());
            $cv_name = $user->uploadUserCv($this->request->cv);
            $user->deleteUserCv();
            $user->update([
                'cv' => $cv_name,
            ]);
        }

        // upload video cv
        if ($this->request->hasFile('video_cv')) {
            $this->validate($this->request, $this->user_model->validate_video_cv());
            $video_name = $user->uploadVideoCv($this->request->video_cv);
            $user->deleteVideoCv();
            $user->update([
                'video_cv' => $video_name,
            ]);
        }

        return redirect()->route('admin.users')->withMessage('user updated successfully!');
    }

    public function search()
    {
        $keyword = $this->request->search;
        $users = $this->user_model->where('first_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('last_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->orWhere('title', 'LIKE', '%' . $keyword . '%')
            ->latest()->paginate(10);
        return view('admin.pages.users.search', compact('users'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import()
    {
        $this->validate($this->request, $this->user_model->validate_excel());
        try {
            Excel::import(new UsersImport, $this->request->file);
        } catch (\Exception $e) {
            return back()->withErrorS($e->getMessage());
        }
        return back()->withMessage('data imported successfully');
    }
    public function delete_import()
    {
        $this->validate($this->request, $this->user_model->validate_excel());
        try {
             Excel::import(new UsersImporDeletet, $this->request->file);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withErrorS($e->getMessage());
        }
        return back()->withMessage('data imported successfully');
    }
    public function delete_import_get()
    {
        return view('delete_import');
    }
}
