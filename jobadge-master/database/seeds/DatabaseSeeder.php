<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // AdminTableSeeder::class,
            // PackageSeeder::class,
            // ContentTableSeeder::class
            JobSeeder::class,
            BlogSeeder::class
        ]);
    }
}
