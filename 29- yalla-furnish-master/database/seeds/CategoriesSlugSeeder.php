<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::get();
        foreach ($categories as $category) {
            $category->update([
                'slug' => str_slug($category->name_en),
            ]);
        }
    }
}
