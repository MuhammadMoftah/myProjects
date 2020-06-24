<?php

namespace App\Blog\Controllers\Web;

use App\Blog\Model\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog\Services\BlogService;
use App\Blog\Requests\BlogRequest;


class AdminBlogController extends Controller
{
    //
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
       
    }


    public function index(){
          
       
        return view("Blog::admin.index",[
            "blogs"         =>$this->blogService->getBlogs(),
            "report_count"  => $this->blogService->getReportCount()
            ]);
    }

    public function search(Request $request)
    {
        
        return view("Blog::admin.index",[
            "blogs"         =>$this->blogService->getSearchBlogs($request),
            "report_count"  => $this->blogService->getReportCount()
        ]);
    }

    public function details(){
        return view("Blog::user.details");
    }

    public function create(){
        return view("Blog::admin.create");
    }

    public function update(Request $request, Blog $blog){

        $blog->load("tags");
   
        return view("Blog::admin.update",compact("blog"));
    }

    public function edit(BlogRequest $request, Blog $blog){

        
        $this->blogService->update($request , $blog);
        return view("Blog::admin.update",compact("blog"));
    }

    public function store(BlogRequest $request){
       $this->blogService->store($request);
       return redirect()->route('admin.blogs.index')->withMessage('blog add successfully!');
    }

    public function destory(Blog $blog){

        $this->blogService->delete($blog);
        return redirect()->route('admin.blogs.index')->withMessage('blog deleted successfully!');
    }
}
