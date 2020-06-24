<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name_en' => Str::random(10),
                'name_ar' => 'اسم المنتج',
                'description_en' => Str::random(50),
                'description_ar' => 'وصف المنتج',
                'price' => rand(100, 1000),
                'approve' => 1,
                'guarantee' => 2,
                'style_id' => 2,
                'material_id' => 1,
                'color_id' => 1,
                'showroom_id' => 2,
                'size' => 'size , medium ,large'
            ]);
        }
    }
}
