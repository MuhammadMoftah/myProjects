<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\admin\AdminService;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\EditAdminRequest;
use Spatie\Permission\Models\Role;
use Auth;

class AdminController extends Controller
{

    protected $admin_service;

    public function __construct(AdminService $admin_service)
    {
        $this->admin_service = $admin_service;

        $this->middleware('permission:admin-list', ['only' => ['getAllAdmins', 'getSingleAdmin']]);
        $this->middleware('permission:admin-create', ['only' => ['getCreate', 'postCreate']]);
    }

    public function getLogin()
    {
        return view('admin.pages.login');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors('wrong email or password');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.login.get');
    }

    public function getDashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function getAllAdmins()
    {
        $admins = $this->admin_service->getAllAdmins();

        if (request()->ajax()) {
            return view('admin.pages.admins.admins_data', compact('admins'))->render();
        }

        return view('admin.pages.admins.all', compact('admins'));
    }

    public function getSingleAdmin($id)
    {
        $admin = $this->admin_service->getSingleAdmin($id);

        return view('admin.pages.admins.view', compact('admin'));
    }

    public function getCreate()
    {
        $roles = Role::all();
        return view('admin.pages.admins.create', compact('roles'));
    }

    public function postCreate(AddAdminRequest $request)
    {
        $this->admin_service->storeAdmin();

        return back()->withMessage('Sub Admin created successfully');
    }

    public function getEdit($id)
    {
        $roles = Role::all();
        $admin = $this->admin_service->getSingleAdmin($id);
        $admin_roles = $admin->roles->pluck('id')->all();

        return view('admin.pages.admins.edit', compact('roles', 'admin', 'admin_roles'));
    }

    public function postEdit($id, EditAdminRequest $request)
    {
        $this->admin_service->UpdateAdmin($id);
        return redirect()->route('admin.subadmins.get')->withMessage('Sub Admin created successfully');
    }
}
