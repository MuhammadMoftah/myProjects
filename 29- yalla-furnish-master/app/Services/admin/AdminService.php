<?php

namespace App\Services\admin;

use App\Admin;
use Illuminate\Http\Request;

class AdminService
{
    private $admin_model;
    private $request;

    public function __construct(Admin $admin_model, Request $request)
    {
        $this->admin_model = $admin_model;
        $this->request = $request;
    }

    public function getAllAdmins()
    {
        $admins = $this->admin_model->newQuery();

        if (isset($this->request->search)) {
            $keyword = $this->request->search;
            $admins->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('email', 'LIKE', '%' . $keyword . '%');
            });
        }

        $admins = $admins->where('super_admin', 0)->latest()->paginate(10);

        return $admins;
    }

    public function getSingleAdmin($id)
    {
        return $this->admin_model->where(['super_admin' => 0, 'id' => $id])->firstOrFail();
    }

    public function storeAdmin()
    {
        $admin = $this->admin_model->create([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'password' => $this->request->password,
            'super_admin' => 0
        ]);

        $admin->assignRole($this->request->input('roles'));
    }

    public function UpdateAdmin($id)
    {
        $admin = $this->getSingleAdmin($id);

        $new_admin_data = [
            'name' => $this->request->name,
            'email' => $this->request->email,
        ];

        isset($this->request->password) ? $new_admin_data['password'] = $this->request->password : '';

        $admin->update($new_admin_data);

        $admin->assignRole($this->request->input('roles'));
    }
}
