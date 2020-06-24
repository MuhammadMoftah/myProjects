<?php

use Illuminate\Database\Seeder;
use App\Background;

class BackgroundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backgrounds = [
            [
                'image' => '1.jpg',
                'type' => 1
            ],
            [
                'image' => '2.jpg',
                'type' => 2
            ],
            [
                'image' => '3.jpg',
                'type' => 3
            ],
        ];

        foreach ($backgrounds as $background) {
            Background::create(['image' => $background['image'], 'type' => $background['type']]);
        }
    }
}
