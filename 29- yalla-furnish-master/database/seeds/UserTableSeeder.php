<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'email' => 'ibrahim@ibrahim.com',
            'password' => 'ibrahim1234',
            'name' => 'admin',
            'super_admin' => 1
        ]);

        $admin->assignRole('super admin');
    }
}
