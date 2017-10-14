<?php

namespace App;

use App\model;
use App\category;
use App\brand;
use App\status;
use App\customer;
use App\problem_and_price;

class order extends model
{
    public function set_order()
    {
        $problem_obj = new problem_and_price;
        
        $problem_obj->add_problem_and_price();

        if(!$status_id = request('status_id'))
        {
            if(status::count())
            {
                $status_id = status::where('flag', '=', 1)->select('id')->get();
                
                foreach ($status_id as $value) 
                {
                    $status_id = $value->id;
                }
            }
        }

        try 
        { 
            order::create(['id' => request('id'), 'customer_id' => request('customer_id'), 'category_id' => request('category_id'), 'brand_id' => request('brand_id'), 'device_name' => request('device_name'), 'imei_no' => request('imei_no'), 'from' => request('from'), 'to' => request('to'), 'status_id' => $status_id, 'total' => request('total'), 'advance' => request('advance'), 'balance' => request('balance')]);
            
            session()->flash('message', "Congrats! New Order has been placed successfully.");
            session(['num_of_orders' => order::count()]);
        } 
        catch(\Illuminate\Database\QueryException $ex)
        { 
            session()->flash('exception', "Error: " . "IMEI number already Exists");
        }

        $print = request('print');
        if($print == 'true')
            return redirect('report')->with('rep_id', request('rep_id'));

        return back();
    }

    public function view_order()
    {
     	$orders = order::join('customers', 'orders.customer_id', '=', 'customers.id')
                        ->join('categories', 'orders.category_id', '=', 'categories.id')
                        ->join('brands', 'orders.brand_id', '=', 'brands.id')
                        ->join('statuses', 'orders.status_id', '=', 'statuses.id')
                        ->select('orders.*', 'customers.customer_name', 'categories.category_name', 'brands.brand_name', 'statuses.status', 'statuses.color')
                        ->get();

        return view('/view_order', compact('orders'));   
    }

    public function order_fields()
    {
     	$orders = order::latest()->select('id')->limit(1)->get();
        foreach($orders as $order)
        {
            $orders = $order->id + 1;
        }
        if(!count($orders))
            $orders = 1;

        $categories = category::all();
        $brands = brand::all();
        $statuses = status::all();
        $customers = customer::all();

        // For Editting purpose
            $update_order = false;
            if(request('order_edit_id'))
                $update_order = true;

            $order_id = request('order_edit_id');
            $order_edit = order::where('id', '=', $order_id)->get();

        return view('/add_order', compact('orders', 'categories', 'brands', 'statuses', 'customers', 'order_edit', 'order_id', 'update_order', 'problems'));   
    }

    public function delete_order()
    {
        $order_id = request('order_del_id');
        order::where('id', '=', $order_id)->delete();
        problem_and_price::where('order_id', '=', $order_id)->delete();

        session()->flash('message', "Congrats! Order number '$order_id' has been Deleted successfully.");
        session(['num_of_orders' => order::count()]);
        return redirect('view_order');
    }

    public function problems()
    {
        return $this->hasMany('App\problem_and_price');
    }
}
