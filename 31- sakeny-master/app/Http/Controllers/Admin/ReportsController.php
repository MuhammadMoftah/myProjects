<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reports;

class ReportsController extends CoreController
{
     function __construct(Reports $model)
    {
        $this->model = $model;
        $this->show_columns_html = ['id', 'reason'];
        $this->show_columns_select = ['id', 'reason'];
        parent::__construct();
    }
}
