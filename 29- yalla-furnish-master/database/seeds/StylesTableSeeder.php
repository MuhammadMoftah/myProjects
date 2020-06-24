<?php

use Illuminate\Database\Seeder;
use App\Style;
use Illuminate\Support\Str;


class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Style::create([
                'name_en' => Str::random(10),
                'name_ar' => Str::random(10)
            ]);
        }
    }
}
