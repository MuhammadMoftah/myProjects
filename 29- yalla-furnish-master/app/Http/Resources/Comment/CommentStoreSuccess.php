<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;
// comment polymorphic store success response
class CommentStoreSuccess extends JsonResource
{

   public $comment;

   public function __construct($comment)
   { 
      $this->comment = $comment;
   }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [    
            'comment' => $this->comment, 
            'status' => 201, 
            'message' => 'Comment Store Successfully'
        ];
    }
}
