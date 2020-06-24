<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentUpdateSuccess extends JsonResource
{
    protected $comment;
    public function __construct($comment) {
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
            'message' => "comment Edited Successfuly", 
            'comment' =>  $this->comment, 
            'status'  => 'error' ,
            'code'    => 200 
        ];
    }
}
