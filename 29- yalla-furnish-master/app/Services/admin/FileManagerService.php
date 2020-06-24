<?php

namespace App\Services\admin;

use Illuminate\Support\Facades\Storage;


class FileManagerService {


    public function getValidation(){
        return  [
            "images"    => "required|array|min:1",
            "images.*"  => "required|image",
        ];
    }

    public function checkUplodateValidation(&$request){
        $request->validate($this->getValidation());
    }

    public function getImages(){
        $images = collect( Storage::disk('s3')->allFiles('uitilities') );
        return   $images->map(function($image){
            return Storage::disk('s3')->url($image);
        });
        
    }

    public function saveImages(&$request){

        foreach($request->images as $image){
            $imageName = "uitilities/" . time().'.'.$image->getClientOriginalExtension();
            Storage::disk('s3')->put($imageName, file_get_contents($image), "public");
        }
    }

    public function deleteImags(&$request){

        foreach($request->deleted as $image){
            Storage::disk('s3')->delete(str_replace(env("AWS_URL"),"",$image));
        }
    }

}