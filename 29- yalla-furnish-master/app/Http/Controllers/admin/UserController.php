<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\UserService;

class UserController extends Controller
{
    protected $user_service;

    public function __construct(UserService $user_service)
    {
        $this->middleware('permission:user-list', ['only' => ['getAllUsers', 'getSingleUser']]);
        $this->middleware('permission:user-edit', ['only' => ['becomeContentCreator']]);

        $this->user_service = $user_service;
    }

    public function getAllUsers()
    {
        $users = $this->user_service->getAllUsers();
        // dd($users->total());
        if (request()->ajax()) {
            return view('admin.pages.users.users_data', compact('users'))->render();
        }

        return view('admin.pages.users.all', compact('users'));
    }

    public function getAllContentCreators()
    {
        $creators = $this->user_service->getAllContentCreators();

        if (request()->ajax()) {
            return view('admin.pages.content_creators.creators_data', compact('creators'))->render();
        }

        return view('admin.pages.content_creators.all', compact('creators'));
    }

    public function getSingleUser($id)
    {
        $user = $this->user_service->getSingleUser($id);

        return view('admin.pages.users.view', compact('user'));
    }

    public function becomeContentCreator($id)
    {
        $this->user_service->becomeContentCreator($id);

        return back();
    }
}
