<?php

namespace App\Blog\Controllers\Web;

use Illuminate\Http\Request;
use App\Blog\Services\BlogService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Blog\Requests\{
    CommentRequest,
    LikeRequest,
    ReportRequest
};

use App\Blog\Model\Blog;
use App\Blog\Model\Comment;
use Spatie\Tags\Tag;

class UserBlogController extends Controller
{
    //
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
        
        
        
       
    }

    public function index(Request $request){
        if($request->has("search")){
            return view("Blog::user.search",[
                "blogs" => $this->blogService->getBlogsUser(4, $request)
            ]);
        }else{
            if($request->ajax()){
                return response()->json($this->blogService->ajexLoadMoreBlogs($request));
             }
            return view("Blog::user.home",[
                "blogs" => $this->blogService->getBlogsUser(4, $request)
            ]);
        }
    }



    public function details($slug){
    
        $blog           = $this->blogService->getBlogsDetails($slug);
        $relateds       = $this->blogService->getRelatedBlogs($blog);
        return view("Blog::user.details",[
            "blog"          => $blog,
            "relateds"      => $relateds
        ]);
    }

    public  function likeAction(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            
            'user_type'      => 'required|in:user,company',
            'user_id'        =>"required|exists:".( $request->user_type == "user" ? "users" :"companies" ).",id",
            'blog_id'        => 'required|exists:blogs,id',
        ]);

        if ( $validator->passes() )
        {
            
            return response()->json( $this->blogService->likeAction($request) );
        }
        else{
            foreach ((array)$validator->errors() as $key => $value){
                foreach ($value as $msg){
                    return response()->json(['key' => '0', 'msg' =>  $msg[0]]);
                }
            }
        }


        
    }

    public function index2(){
        return view("Blog::user.home_2");
    }

    public function comment(CommentRequest $request){
       
        $this->blogService->comment_save($request);
        return back()->withMessage(' comment add  sucessfully ');
    }

    public function like(LikeRequest $request){
       
        $res  = $this->blogService->likeAction($request);
        if($res["key"] == 0 ) abort("404");
        $msg = $res["like"] ==  1 ? "Like sucessfully" : "unLike sucessfully" ;
        return back()->withMessage($msg);
    }

    public function report(ReportRequest $request){
       
        $res  = $this->blogService->commentReport($request);
        
        return back()->withMessage("report send sucessfully");
    }

    public function shareProfile($provider, $blog)
    {
        $blog = Blog::findOrFail($blog);
        $blog->increment('shares');
        $sharelink =  $blog->generateShareLink($provider);
        return redirect($sharelink);
    }

    public function commentDelete(Comment $comment ){
        if(
            ( auth("company")->check() && $comment->comment_type =="App\Company" && auth("commpany")->id() != $comment->comment_id ) || 
            ( auth("user")->check() && $comment->comment_type =="App\User" && auth("user")->id() != $comment->comment_id )
        ) 
        return back()->withErrors(['Comment not belongs to you']);  
        $comment->delete();
        return back()->withMessage("comment delete sucessfully");
    }
    
}
