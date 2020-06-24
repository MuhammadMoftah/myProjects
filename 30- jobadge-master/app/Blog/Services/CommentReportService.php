<?php

namespace App\Blog\Services;

use App\Blog\Model\{
    Blog,
    CommentReport,
    Comment,
    Like
};


class CommentReportService 
{
    
    protected $repoertCommentModel ;

    public function __construct(CommentReport $repoertCommentModel)
    {
       $this->repoertCommentModel = $repoertCommentModel;
    }

    
    
    function getRports(&$request){
       $query  =  $this->repoertCommentModel->query();

       if($request->status) {
          $seen   = $request->status == "seen" ? 1 : 0;
          $query->where("is_seen",$seen);
       }

       if($request->by) {
            $comment_report_type  = $request->by == "App\User" ? "App\User" : "App\Company";
            $query->where("comment_report_type",$comment_report_type);
        }

       return $query->with(["comment","commentReport"])->latest()->paginate(10);
    
    }


    





    
}
