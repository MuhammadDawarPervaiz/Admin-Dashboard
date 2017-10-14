<?php

namespace App\Http\Controllers;

use App\dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(dashboard $dashboard)
    {
        return $dashboard->order_details();
    }

    /* For Ajax
    public function latest_order()
    {
        $latest = order::all();
        return response($latest->all());
    }/**/
}
