<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Language;
use App\User;

class LanguageController extends Controller
{

    protected $language_model;
    protected $request;

    public function __construct(Language $language_model, Request $request)
    {
        $this->request = $request;
        $this->language_model = $language_model;
    }

    public function getCreate($user_id, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);
        return view('admin.pages.users.languages.create', compact('user'));
    }

    public function postCreate($user_id, User $user_model)
    {
        $user = $user_model->findOrFail($user_id);

        $this->validate($this->request, $this->language_model->getCreateRules($user->id));

        $this->language_model->create([
            'language' => $this->request->language,
            'rate' => $this->request->rate,
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.users.view', $user->id)->withMessage('language created successfully!');
    }

    public function delete($id)
    {
        $language = $this->language_model->findOrFail($id);
        return $language->delete() ? back()->withMessage('language has been deleted') : abort(500);
    }

    public function getView($id)
    {
        $language = $this->language_model->findOrFail($id);
        return view('admin.pages.users.languages.view', compact('language'));
    }

    public function getEdit($id, Country $country_model, Industry $industry_model)
    {
        $language = $this->language_model->findOrFail($id);
        return view('admin.pages.users.languages.edit', compact('language'));
    }

    public function postEdit($id)
    {
        $language = $this->language_model->findOrFail($id);
        $this->validate($this->request, $language->getUpdateRules($language->user_id));

        $exist_language = $language->checkLangForUser($language->user_id, $this->request->language);

        if ($exist_language) {
            return back()->withErrors('this language is already added');
        }

        $language->update([
            'language' => $this->request->language,
            'rate' => $this->request->rate,
        ]);

        return redirect()->route('admin.users.view', $language->user_id)->withMessage('language updated successfully!');
    }
}
