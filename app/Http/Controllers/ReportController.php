<?php

namespace App\Http\Controllers;

use App\report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index_view(report $report_obj)
    {
        return $report_obj->view_report();
    }

    public function report(report $report_obj)
    {
        return $report_obj->send_report();
    }
}
