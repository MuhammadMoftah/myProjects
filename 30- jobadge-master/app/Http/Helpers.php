<?php

use App\Visitor;


function getRequestBetweenPages()
{
    $link = [];

    if (isset(request()->search)) {
        $link['search'] = request()->search;
    }
    if (isset(request()->category_id)) {
        $link['category_id'] = request()->category_id;
    }
    if (isset(request()->country_id)) {
        $link['country_id'] = request()->country_id;
    }
    if (isset(request()->city_id)) {
        $link['city_id'] = request()->city_id;
    }
    if (isset(request()->jobtype_id)) {
        $link['jobtype_id'] = request()->jobtype_id;
    }
    if (isset(request()->joblevel_id)) {
        $link['joblevel_id'] = request()->joblevel_id;
    }
    if (isset(request()->post_date)) {
        $link['post_date'] = request()->post_date;
    }
    if (isset(request()->experience)) {
        $link['experience'] = request()->experience;
    }
    if (isset(request()->requirement)) {
        $link['requirement'] = request()->requirement;
    }
    if (isset(request()->title)) {
        $link['title'] = request()->title;
    }
    if (isset(request()->age)) {
        $link['age'] = request()->age;
    }
    if (isset(request()->first_name)) {
        $link['first_name'] = request()->first_name;
    }
    if (isset(request()->last_name)) {
        $link['last_name'] = request()->last_name;
    }
    if (isset(request()->place_name)) {
        $link['place_name'] = request()->place_name;
    }
    if (isset(request()->skills)) {
        $link['skills'] = request()->skills;
    }
    if (isset(request()->keyword)) {
        $link['keyword'] = request()->keyword;
    }

    return $link;
}

function addVisitor()
{
    Visitor::addVisitor();
}


function converPagantionToURL($url){
    if( config("app.is_local") == "NO" ){
           
           return str_replace("http", "https", $url );
    }
    return $url;
              
}
