<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IdeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 40) as $index) {
            DB::table('ideas')->insert([
                'name_ar' => 'العنوان',
                'name_en' => $faker->text($maxNbChars = 100),  
                'desc_ar' => $faker->text($maxNbChars = 1000),
                'desc_en' => $faker->text($maxNbChars = 1000),
                'idea_image' =>"article-photo.jpg",
                'cat_id' =>$faker->numberBetween($min=1,$max=10),
                'user_id' =>$faker->numberBetween($min=1,$max=10),
            ]);
        }
    }
}
