<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'email' => 'admin@admin.com',
            'password' => 'admin1234',
            'name' => 'admin',
            'super_admin' => 1
        ]);

        $admin->assignRole('super admin');
    }
}
