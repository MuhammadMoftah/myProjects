<?php

namespace App\Blog\Controllers\Web;

use App\Blog\Model\CommentReport;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Blog\Services\CommentReportService;

class CommentReportController extends Controller
{
    //
    //
    protected $reportService;

    public function __construct(CommentReportService $reportService)
    {
        $this->reportService = $reportService;
       
    }

    public function index(Request $request){
        return view("Blog::admin.report.index",[
            "reports"         =>$this->reportService->getRports($request),
            ]);
    }


    public function show(Request $request, CommentReport $report){
        $report->load(["comment.comment","commentReport"]);
        $report->update(["is_seen"=>1]);
        return view("Blog::admin.report.details",[
            "report"         =>$report,
            ]);
    }

    

    public function destory(Request $request, CommentReport $report){
        $report->delete();
        return redirect()->route('admin.blogs.report.index')->withMessage('report deleted successfully!');
    }


}
