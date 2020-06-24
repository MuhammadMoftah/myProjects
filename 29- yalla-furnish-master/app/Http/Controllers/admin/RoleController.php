<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\AddRoleRequest;
use App\Services\admin\RoleService;

class RoleController extends Controller
{
    private $role_service;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(RoleService $role_service)
    {
        $this->middleware('permission:role-list', ['only' => ['getAllRoles']]);
        $this->middleware('permission:role-create', ['only' => ['getCreate', 'postCreate']]);

        $this->role_service = $role_service;
    }

    public function getAllRoles()
    {
        $roles = $this->role_service->getAllRoles();

        if (request()->ajax()) {
            return view('admin.pages.roles.roles_data', compact('roles'))->render();
        }

        return view('admin.pages.roles.all', compact('roles'));
    }

    public function getCreate()
    {
        $permission = Permission::get();
        return view('admin.pages.roles.create', compact('permission'));
    }

    public function postCreate(AddRoleRequest $request)
    {
        $this->role_service->storeRole();

        return back()->withMessage('Role created successfully');
    }
}
