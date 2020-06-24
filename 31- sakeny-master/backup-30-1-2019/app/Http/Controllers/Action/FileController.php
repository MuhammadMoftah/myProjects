<?php

namespace App\Http\Controllers\Action;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class FileController extends Controller
{


    public static function upload($file, $destination = 'storage', $name = '')
    {
        return $file->store("{$destination}/{$name}");
    }

    public static function upload_image($file, $destination = 'storage', $name = '')
    {
        $image = Image::make($file);
        $image->orientate(); //set orientate to 0
        $image->encode('jpg'); // convert to jpg

        $file_name = md5($image->__toString());
        $path = "uploads/{$file_name}.jpg";

        $image->save(public_path($path));
        return $path;
    }

    public function getImage($path)
    {
        $image = Image::make($path);
        if (request('width') && request('height')) {
            $image->resize(request('width'), request('height'));
        }
        $image = $image->stream('jpg');
        return response($image)->header('Content-Type', 'image/jpeg');;
    }
}
