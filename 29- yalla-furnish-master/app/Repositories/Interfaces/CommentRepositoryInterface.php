<?php 
namespace App\Repositories\Interfaces;

interface CommentRepositoryInterface {
    public function store($commentableModel);
    public function delete($id); 
    public function update($id, $body); 
    public function get($id); 
}
