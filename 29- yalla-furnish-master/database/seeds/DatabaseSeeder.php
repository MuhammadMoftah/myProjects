<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     // IdeasTableSeeder::class,
        //     // StylesTableSeeder::class,
        //     // ColorsTableSeeder::class,
        //     // MaterialsTableSeeder::class,
        //     // ProductsTableSeeder::class,
        // ]);
        $faker = Faker::create();
        foreach (range(1, 40) as $index) {
            DB::table('follow_users')->insert([
                'follower_id' => $faker->numberBetween($min = 1, $max = 10),
                'following_id' => $faker->numberBetween($min = 1, $max = 10),
            ]);
        }
        // foreach (range(1, 40) as $index) {
        //     DB::table('ideas')->insert([
        //         'name_ar' => 'العنوان',
        //         'name_en' => $faker->text($maxNbChars = 100),  
        //         'desc_ar' => $faker->text($maxNbChars = 1000),
        //         'desc_en' => $faker->text($maxNbChars = 1000),
        //         'idea_image' =>"article-photo.jpg",
        //         'cat_id' =>$faker->numberBetween($min=1,$max=10),
        //         'user_id' =>$faker->numberBetween($min=1,$max=10),
        //     ]);
        //     }
        //     $faker = Faker::create();
        //     // $this->call(UsersTableSeeder::class);
        //     // $faker = Faker::create();

        //     foreach (range(1, 10) as $index) {
        //         DB::table('users')->insert([
        //             'name' => $faker->name,
        //             'email' => $faker->email,
        //             'password' => bcrypt(rand(111111111, 9999999999)),
        //         ]);
        //     }
        //     foreach (range(1, 10) as $index) {
        //         DB::table('cities')->insert([
        //             'name_ar' => 'القاهره',
        //             'name_en' => $faker->name,
        //         ]);
        //     }
        //     foreach (range(1, 10) as $index) {
        //         DB::table('districtes')->insert([
        //             'name_ar' => 'مصر الجديده',
        //             'name_en' => $faker->email,
        //             'city_id' => $faker->numberBetween(1, 10),
        //         ]);
        //     }


        //     foreach (range(1, 10) as $index) {
        //         DB::table('showrooms')->insert([
        //             'name_ar' => 'اسم المعرض',
        //             'name_en' => $faker->name,
        //             'showroom_image' => $faker->imageUrl($width = 640, $height = 480),
        //             'showroom_coverImage' => $faker->imageUrl($width = 100, $height = 700),
        //             'rate' => $faker->numberBetween($min = 1, $max = 5),
        //             'yt' => $faker->name,
        //             'tw' => $faker->name,
        //             'fb' => $faker->name,
        //             'website' => $faker->name,
        //             'instgram' => $faker->name,
        //             'about' => $faker->name,
        //             'district_id' => $faker->numberBetween(1, 10),
        //             'user_id' => $faker->numberBetween(1, 10),
        //         ]);
        //     }

        //     foreach (range(1, 10) as $index) {
        //         DB::table('branches')->insert([
        //             'address_ar' => 'المعادي',
        //             'address_en' => $faker->name,
        //             'working_to' => $faker->numberBetween(1, 12) . "PM",
        //             'working_from' => $faker->numberBetween(1, 12) . "AM",
        //             'mob2' => $faker->e164PhoneNumber,
        //             'mob1' => $faker->e164PhoneNumber,
        //             'tel1' => $faker->tollFreePhoneNumber,
        //             'tel2' => $faker->tollFreePhoneNumber,
        //             'tel3' => $faker->tollFreePhoneNumber,
        //             'lang' => $faker->randomFloat($nbMaxDecimals = 12),
        //             'lat' => $faker->randomFloat($nbMaxDecimals = 12),
        //             'showroom_id' => $faker->numberBetween(1, 10),
        //         ]);
        //     }
        //     foreach (range(1, 10) as $index) {
        //         DB::table('showrooms_followers')->insert([
        //             'showroom_id' => $faker->numberBetween(1, 10),
        //             'user_id' => $faker->numberBetween(1, 10),
        //         ]);
        //     }
        //     // // $this->call(UsersTableSeeder::class);
        //     // $faker = Faker::create();


        //     // foreach (range(1, 100) as $index) {
        //     //     DB::table('cities')->insert([
        //     //         'name_ar' => 'القاهره',
        //     //         'name_en' => $faker->name,
        //     //     ]);
        //     // }
        //     foreach (range(1, 100) as $index) {
        //         DB::table('ideas')->insert([
        //             'name_ar' => 'عنوان ',
        //             'name_en' => $faker->name,  
        //             'desc_ar' => $faker->text($maxNbChars = 1000),
        //             'desc_en' => $faker->text($maxNbChars = 1000),
        //             'idea_image' => $faker->imageUrl(),
        //         ]);
        //     }
        //     // foreach (range(1, 100) as $index) {
        //     //     DB::table('showrooms')->insert([
        //     //         'name_ar' => 'اسم المعرض',
        //     //         'name_en' => $faker->name,
        //     //         'showroom_image' => $faker->imageUrl($width = 640, $height = 480),
        //     //         'showroom_coverImage' => $faker->imageUrl($width = 1000, $height = 700),
        //     //         'rate' => $faker->numberBetween($min = 1, $max = 5),
        //     //         'district_id' => $faker->numberBetween(1, 100),
        //     //         'user_id' => $faker->numberBetween(1, 100),
        //     //     ]);
        //     // }
    }
}
