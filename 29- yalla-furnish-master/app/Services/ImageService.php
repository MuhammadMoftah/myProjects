<?php 
namespace App\Services;
use App\Image;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ImageService {

    public $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository) {
        $this->imageRepository = $imageRepository;
    }
    // store Image 
    public function store($image , $imageableData) {
        $path = $this->storageSave($image ,   $imageableData['type']); 
        return $this->imageRepository->store($path, $imageableData);
    }
   
    // save image in storage 
    public function storageSave($image, $type) { 
        $image_name = time() . uniqid() . '.' . $image->getClientOriginalExtension(); 
        if ($type = 'App\Comment'){
            if (!Storage::disk('s3')->put('comments/' . $image_name, $image, 'public')) {
                throw new \Exception('error in uploading image');
            }
        } 
        return $image_name;
    } 

    // save image in storage 
    public function storagedelete($image, $type) { 
        if ($type = 'App\Comment'){
            if (!Storage::disk('s3')->put('comments/' . $image_name, $image, 'public')) {
                throw new \Exception('error in uploading image');
            }
        }  
    } 
}