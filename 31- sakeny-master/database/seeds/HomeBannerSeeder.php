<?php

use Illuminate\Database\Seeder;
use App\Models\HomeBanner;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'type' => 'middle_of_site',
            ],
            [
                'type' => 'first_right_ad',
            ],
            [
                'type' => 'first_left_ad',
            ],
            [
                'type' => 'second_left_ad',
            ],
            [
                'type' => 'second_right_ad',
            ],
            [
                'type' => 'third_right_ad',
            ],
            [
                'type' => 'third_left_ad',
            ],
            [
                'type' => 'bottom_of_site',
            ],
        ];

        foreach ($banners as $banner) {
            HomeBanner::create($banner);
        }
    }
}
