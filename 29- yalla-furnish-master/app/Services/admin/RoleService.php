<?php

namespace App\Services\admin;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleService
{
    private $role_model;
    private $request;

    public function __construct(Role $role_model, Request $request)
    {
        $this->role_model = $role_model;
        $this->request = $request;
    }

    public function getAllRoles()
    {
        return $this->role_model->latest()->paginate(10);
    }

    public function storeRole()
    {
        $role = $this->role_model->create([
            'name' => $this->request->name,
        ]);

        $role->syncPermissions($this->request->input('permission'));
    }
}
