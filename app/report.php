<?php

namespace App;

use App\model;
use App\order;
use App\company_details;

class report extends model
{
    public function view_report()
    {
     	$reports = order::join('customers', 'orders.customer_id', '=', 'customers.id')
                        ->select('orders.*', 'customers.customer_name')
                        ->get();

        return view('/view_report', compact('reports')); 
    }

    public function send_report()
    {
        if(session('rep_id'))
            $rep_id = session('rep_id');
        else
            $rep_id = request(['rep_id']);

     	$orders = order::join('customers', 'orders.customer_id', '=', 'customers.id')
				     	->join('categories', 'orders.category_id', '=', 'categories.id')
				     	->join('brands', 'orders.brand_id', '=', 'brands.id')
                        ->select('orders.*', 'customers.customer_name', 'customers.customer_email', 'customers.customer_contact', 'categories.category_name', 'brands.brand_name')
                        ->where('orders.id', '=', $rep_id)
                        ->get();

        $banner_images = company_details::select('banner_image')->limit(1)->get();

        session()->forget('rep_id');
        //$problems = order::find(1)->problems;

        return view('/report', compact('orders', 'banner_images')); 
    }
}
