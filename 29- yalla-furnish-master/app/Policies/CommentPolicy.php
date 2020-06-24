<?php

namespace App\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;
use App\ModelInterfaces\UserInterface;
use App\Comment; 
class CommentPolicy
{
    use HandlesAuthorization;  
    //  this will check before any policies checks 
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
     //  create comment
    public function create(UserInterface $user)
    {  
        return true; 
    }  
    //  update comment
    public function update(UserInterface $user, Comment $comment)
    { 
        if ($comment->user->is($user)) {
            return true;
        } 
    }  
    //  delete comment
    public function delete(UserInterface $user, Comment $comment)
    {    
        if ($comment->user->is($user)) {
            return true;
        }
    }  
}
