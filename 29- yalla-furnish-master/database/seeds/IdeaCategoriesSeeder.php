<?php

use Illuminate\Database\Seeder;
use App\Idea;
use App\IdeaCategory;

class IdeaCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ideas = Idea::get();
         if ($ideas) {
            foreach ($ideas as $idea){ 
                $idea_id =$idea->id;
                $category_id = $idea->cat_id;
   
                IdeaCategory::create([
                    'idea_id' =>  $idea_id,
                    'category_id' =>  $category_id
                ]); 
            } 
        }
    }
}
