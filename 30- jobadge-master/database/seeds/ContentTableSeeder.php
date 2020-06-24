<?php

use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            [
                'body' => 'aboutus content',
                'type' => 'aboutus',
            ],
            [
                'body' => 'privacy content',
                'type' => 'privacy',
            ],
        ];
        DB::table('contents')->insert($contents);
    }
}
