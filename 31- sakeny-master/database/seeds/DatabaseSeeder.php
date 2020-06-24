<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        // $this->call(UsersTableSeeder::class);
        //
        /*for ($i=0; $i < 1000; $i++) {
            DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'phone'=>$faker->phoneNumber,
                'api_token'=>$faker->phoneNumber,
                'password'=>bcrypt(123456),
                'activation'=>1,
            ]);
        }*/


        DB::table('users')->update([
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),

            ]);


        /*for ($i=0; $i < 5000; $i++) {
            DB::table('posts')->insert([
                'user_id'=>$faker->randomDigit ,
                'body'=>$faker->sentence ,

            ]);
        }*/

        DB::table('admins')->insert([
            	'name'=>'Admin',
            	'email'=>'admin@admin.com',
            	'password'=>bcrypt(123123),
            	'activation'=>1,
        	]);


    }
}
