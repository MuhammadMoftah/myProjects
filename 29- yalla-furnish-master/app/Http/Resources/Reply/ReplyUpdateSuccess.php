<?php

namespace App\Http\Resources\Reply;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyUpdateSuccess extends JsonResource
{
    protected $reply;
    public function __construct($reply) {
        $this->reply = $reply;
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
            'message' => "Reply Update Successfully", 
            'comment' =>  $this->reply, 
            'status'  => 'success' ,
            'code'    => 200 
        ];
    }
}
