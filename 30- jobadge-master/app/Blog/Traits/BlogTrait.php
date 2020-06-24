<?php
 namespace App\Blog\Traits;

 use App\Blog\Model\{
    Comment,
    Like,
    BlogShare,
    CommentReport
};

trait commentBlogTrait {

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    public function deleteCommentsForBlog(){
        $this->comments()->delete();
    }

    /**
     * Get all of the likes's who users do.
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'like');
    }

    public function deleteLikesForBlog(){
        $this->likes()->delete();
    }

    /**
     * Get all of the likes's who users do.
     */
    public function commentReports()
    {
        return $this->morphMany(CommentReport::class, 'comment_report');
    }

    public function deleteCommentReportsForBlog(){
        $this->commentReports()->delete();
    }

    /**
     * Get all of the likes's who users do.
     */
    public function blogShares()
    {
        return $this->morphMany(BlogShare::class, 'shareable');
    }

    public function deleteBlogSharesForBlog(){
        $this->commentReports()->delete();
    }

    public function delete()
    {
        $this->deleteCommentsForBlog();
        $this->deleteBlogSharesForBlog();
        $this->deleteCommentReportsForBlog();
        $this->deleteLikesForBlog();
        return parent::delete();
    }


    public function isLike($blog_id){
        $check  =  $this->likes()->where("blog_id", $blog_id)->first();
        if($check)
            return true;
         return false;   
    }


    public function getNameForBlog(){
        
        if(__CLASS__ == "App\User"){
            return $this->full_name;
        }
        return $this->name;
    }

    public function getImageForBlog(){
        if(__CLASS__ == "App\User"){
            return $this->getUserImage();
        }
        return $this->getCompanyLogo();
    }




}