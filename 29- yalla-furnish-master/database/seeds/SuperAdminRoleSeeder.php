<?php


use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;

class SuperAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $role = Role::create([
            'name' => 'super admin',
        ]);

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
