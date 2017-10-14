<?php

namespace App;

use App\model;
use App\order;
use App\category;
use App\brand;
use App\customer;
use App\status;
use Illuminate\Database\Query\Expression as raw;

class dashboard extends model
{
    public function order_details()
    {
    	$orders = order::count();           session(['num_of_orders' => $orders]);
        $categories = category::count();    session(['num_of_cat' => $categories]);
        $brands = brand::count();           session(['num_of_brands' => $brands]);
        $customers = customer::count();     session(['num_of_cus' => $customers]);
                                            session(['num_of_statuses' => status::count()]);
        
        $cus_overview = order::join('customers', 'orders.customer_id', '=', 'customers.id')
                            ->select(new raw('count(orders.id) as total_orders, sum(orders.balance) as total_ammount, customers.customer_name'))
                            ->groupBy('customers.customer_name')
                            ->get();

        $cus_orders = order::join('customers', 'orders.customer_id', '=', 'customers.id')
                            ->join('statuses', 'orders.status_id', '=', 'statuses.id')
                            ->select('orders.id', 'orders.balance', 'orders.from', 'customers.customer_name', 'statuses.status', 'statuses.color')
                            ->get();

        return view('dashboard', compact('orders', 'categories', 'brands', 'customers', 'cus_overview', 'cus_orders'));
    }
}
