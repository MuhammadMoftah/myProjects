<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Visitor;
use App\Exports\VisitorExport;
use Maatwebsite\Excel\Facades\Excel;

class VisitorController extends Controller
{
    protected $visitor_model;
    protected $request;

    public function __construct(Visitor $visitor_model, Request $request)
    {
        $this->visitor_model = $visitor_model;
        $this->request = $request;
    }

    public function getAll()
    {
        $visitors = $this->visitor_model->newQuery();

        if ($this->request->search) {
            $visitors->where('browser', 'LIKE', '%' . $this->request->search . '%');
        }

        if (isset($this->request->post_date)) {
            if ($this->request->post_date === 'within_24_hours') {
                $visitors->where('created_at', '>', Carbon::now()->subDay());
            } elseif ($this->request->post_date === 'within_1_week') {
                $visitors->where('created_at', '>', Carbon::now()->subDays(7));
            } elseif ($this->request->post_date === 'within_1_month') {
                $visitors->where('created_at', '>', Carbon::now()->subDays(30));
            }
        }

        $visitors = $visitors->latest()->paginate(20);

        return view('admin.pages.visitors', compact('visitors'));
    }

    public function clear()
    {
        $this->visitor_model->truncate();
        return back()->withMessage('history cleared');
    }

    public function export()
    {
        return Excel::download(new VisitorExport, 'visitors.xlsx');
    }
}
