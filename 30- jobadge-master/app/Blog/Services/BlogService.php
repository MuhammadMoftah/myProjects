<?php

namespace App\Blog\Services;

use App\Blog\Model\{
    Blog,
    CommentReport,
    Comment,
    Like
};
use App\{
    User,
    Company
};


class BlogService 
{
    
    protected $blogModel ;

    public function __construct(Blog $blogModel)
    {
       $this->blogModel = $blogModel;
    }

    
    public function getBlogs(){
      
        return $this->blogModel->withCount(["comments","likes"])
                    ->latest()->paginate(10);
    }


    public function getSearchBlogs(&$request){
      
        $keyword = $request->search;
       
        return $this->blogModel->where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('body', 'LIKE', '%' . $keyword . '%')
            ->withCount(["comments","likes"])
            ->latest()->paginate(10);
    }


    public function store(&$request){
     
       $blog =  $this->blogModel->create(
           array_merge($request->validated(), [ "created_by"=>auth("admin")->id() ])
       );
       if($request->tags){
            $tags = explode(",", $request->tags);
            $blog->syncTags( $tags );
       }

        
    }

    public function update(&$request, &$blog){
     
        $blog->update(
            array_merge($request->validated(), [ "created_by"=>auth("admin")->id() ])
        );

        if($request->tags){
             $tags = explode(",", $request->tags);
             $blog->syncTags( $tags );
        }
 
         
    }


     public function delete(&$blog){
        $blog->deleteImage();
        $blog->delete();
         
     }

     public function getReportCount(){
         return CommentReport::invisible()->count();
     }



     public function getBlogsUser($pagnation = 4, &$request=null){
        return $this->blogModel
                    ->where(function($query) use(&$request){
                        $query->where('title', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('body', 'LIKE', '%' . $request->search . '%')
                        ->orWhereHas("tags", function($query) use(&$request) {
                            $lang = config('app.locale');
                            $query->where("name->{$lang}","like", '%' . $request->search.'%');
                        });
                    })
                    ->latest()->paginate($pagnation);
     }

     public function ajexLoadMoreBlogs(&$request=null){
        if(request()->first){
            $blogs = $this->blogModel
                    ->where("id", "!=", request()->first);
            
            if($request->search)  {
                $blogs->where(function($query) use(&$request){
                    $query->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('body', 'LIKE', '%' . $request->search . '%')
                    ->orWhereHas("tags", function($query) use(&$request){
                        $lang = config('app.locale');
                        $query->where("name->{$lang}","like", '%' . $request->search .'%');
                    });
                });
            }     
            $blogs  = $blogs->latest()->paginate(3);         
        }else{
            $blogs = $this->getBlogsUser(3, $request);
        }
       $html = view("Blog::component.blogs",[
            "blogs" =>$blogs
        ])->render();
        return ["key"=>1, "html"=>$html, "nex_url"=> converPagantionToURL($blogs->appends(request()->query())->nextPageUrl()) ];
     }

     public function getBlogsDetails(&$slug){
         $id    = explode("-", $slug)[0];
       
         $blog  = $this->blogModel->withCount(["comments","likes"])
              ->with("tags")  
              ->with("comments")
              ->findOrFail($id);  
         $blog->increment("views");
        //  $blog->refresh();
        return $blog;
     }

     public function getRelatedBlogs(&$blog){
        return $this->blogModel->withAnyTags(explode(",", $blog->getBlogTagesAsString()))
         ->where("id","!=", $blog->id)
         ->limit(3)->get();
        
         
     }


    

     public function likeAction(&$request){
        $user      =  $this->getUser($request->user_id, $request->user_type);
        if($user){
           $like =  $user->likes()->where("blog_id", $request->blog_id)->first();
           if($like){
               $like->delete();
               return ["key"=>1, "like"=> 0];
           }
           $user->likes()->create(["blog_id"=>$request->blog_id]);
           return ["key"=>1, "like"=> 1];
        }
        return ["key"=>0, "msg"=> "user not found"];
     }


     public function comment_save(&$request){
        $user      =  $this->getUser($request->user_id, $request->user_type);
        $user->comments()->create($request->validated());
     }

     public function commentReport(&$request){
        $user      =  $this->getUser($request->user_id, $request->user_type);
        $user->commentReports()->create($request->validated());
     }

     protected function getUser($id, $type){
        if($type == "user"){
           
            return  User::find($id);
        }
        return Company::find($id);
     }


     




    
}
