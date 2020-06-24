<?php

namespace App\Blog\Controllers\Web;

use App\Blog\Model\Comment;
use App\Blog\Model\CommentReport;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class CommentAdminController extends Controller
{
    //
    //
    protected $commentService;

    public function __construct( $commentService = null)
    {
        $this->commentService = $commentService;
       
    }

   


    public function toggle(Request $request, Comment $comment){
      
       $comment->is_active =  $comment->is_active == 0 ?  1 :0;
       $comment->save();
       return back()->withMessage('status change successfully');
    }

    


}
