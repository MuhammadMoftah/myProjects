<?php

use Illuminate\Database\Seeder;
use App\Showroom;

class ShowroomsSlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $showrooms = Showroom::get();
        foreach ($showrooms as $showroom) {
            $showroom->update([
                'slug' => str_slug($showroom->name_en),
            ]);
        }
    }
}
