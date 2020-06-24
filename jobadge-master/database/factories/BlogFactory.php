<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog\Model\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    
    return [
        //
        "title"=>$faker->words( 3, true) ,
        "body"=>$faker->text,
        "image"=>$faker->imageUrl($width = 640, $height = 480) ,
        "created_by"=>1,
        "active"    => 1,
        "priority"  =>1,
        "views"     =>$faker->randomElements([100,200,300], 1)[0],
    ];
});
