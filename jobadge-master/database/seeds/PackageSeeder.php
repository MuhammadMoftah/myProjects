<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name_en' => 'first package en',
                'name_ar' => 'first package ar',
                'no_of_posts' => 1,
                'no_of_jobs' => 1,
                'price' => 1,
                'feature1_en' => 'feature1_en',
                'feature1_ar' => 'feature1_ar',
                'feature2_en' => 'feature2_en',
                'feature2_ar' => 'feature2_ar',
                'feature3_en' => 'feature3_en',
                'feature3_ar' => 'feature3_ar',
            ],
            [
                'name_en' => 'second package en',
                'name_ar' => 'second package ar',
                'no_of_posts' => 1,
                'no_of_jobs' => 1,
                'price' => 1,
                'feature1_en' => 'feature1_en',
                'feature1_ar' => 'feature1_ar',
                'feature2_en' => 'feature2_en',
                'feature2_ar' => 'feature2_ar',
                'feature3_en' => 'feature3_en',
                'feature3_ar' => 'feature3_ar',
            ],
            [
                'name_en' => 'third package en',
                'name_ar' => 'third package ar',
                'no_of_posts' => 1,
                'no_of_jobs' => 1,
                'price' => 1,
                'feature1_en' => 'feature1_en',
                'feature1_ar' => 'feature1_ar',
                'feature2_en' => 'feature2_en',
                'feature2_ar' => 'feature2_ar',
                'feature3_en' => 'feature3_en',
                'feature3_ar' => 'feature3_ar',
            ],
        ];
        DB::table('packages')->insert($packages);
    }
}
