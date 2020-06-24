<?php 
namespace App\Repositories\Interfaces;

interface ReplyRepositoryInterface {
    public function store($repliableModel);
    public function delete($id); 
    public function update($id, $body); 
    public function get($id); 
}
