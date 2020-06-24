<?php 
namespace App\Repositories\Interfaces; 
interface ChatFollowRepositoryInterface {
    public function store(array $pinnableData);
    public function destroy(array $pinnableData);  
    public function get(array $pinnableData);
}
