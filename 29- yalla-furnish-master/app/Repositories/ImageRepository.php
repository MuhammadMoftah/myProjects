<?php 

namespace App\Repositories;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use App\Image;
class ImageRepository implements  ImageRepositoryInterface 
{ 
    public $imageModel;
    
    public function __construct(Image $imageModel) {
        $this->imageModel = $imageModel;
    }
    // store comment - return comment
    public function store(string $path, array $imageableData){
        $image = $this->imageModel->create([
                                            'user_id' => auth('user')->user()->id,
                                            'imageable_type' => $imageableData['type'], 
                                            'imageable_id' => $imageableData['id'], 
                                            'path' => $path
                                        ]);
        return $image; 
    }
    // delete comment - return bollean
    public function delete($id) {
        return $this->imageModel->destroy($id); 
    }
    // update comment - return comment
    public function update($id, $body){
        $image =  $this->get($id);
        $image->update(['body' => $body  ]); 
        return $comment;
    } 
    // get comment - return comment
    public function get($id) { return $this->imageModel->findOrFail($id);  }
}
