<?php 
namespace App\Repositories\Interfaces;

interface ImageRepositoryInterface {
    public function store(string $path, array $imageableData);
    // public function delete($id); 
    // public function update($id, $body); 
    // public function get($id); 
}
