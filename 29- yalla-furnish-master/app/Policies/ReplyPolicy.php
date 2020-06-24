<?php

namespace App\Policies;

use App\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\ModelInterfaces\UserInterface;
 
class ReplyPolicy
{
    use HandlesAuthorization;
   
    //  this will check before any policies checks 
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    //  create reply
    public function create(UserInterface $user)
    {  
        return true; 
    }  
     //  update comment
    public function update(UserInterface $user, Reply $reply)
    { 
        if ($reply->user->is($user)) {
            return true;
        }
    } 
     //  delete comment
    public function delete(UserInterface $user, Reply $reply)
    {    
        if ($reply->user->is($user)) {
            return true;
        }
    } 
}
