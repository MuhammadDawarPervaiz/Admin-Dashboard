<?php

namespace App\Http\Controllers;

use response;
use App\order;
use App\category;
use App\brand;
use App\problem_and_price;
use Illuminate\Http\Request;

class OrderController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index_add(order $order_obj)
    {
        return $order_obj->order_fields();
    }
    
    public function index_view(order $order_obj)
    {
        session(['num_of_orders' => order::count()]);
        return $order_obj->view_order();
    }

    public function add_cus() 
    {
        session(['add_cus' => 'order_form']);
        return redirect('add_customer');
    }

    public function add_cat(Request $cat) 
    {
        if($cat->ajax())
        {
            category::create(['category_name' => $cat->category_name]);
            session(['num_of_cat' => category::count()]);
            return response($cat->all());
        }
    }

    public function add_brand(Request $brand) 
    {
        if($brand->ajax())
        {
            brand::create(['brand_name' => $brand->brand_name]);
            session(['num_of_brands' => brand::count()]);
            return response($brand->all());
        }
    }

    public function delete_problem(Request $delete_problem) 
    {
        if($delete_problem->ajax())
        {
            problem_and_price::where('id', '=', $delete_problem->id)->delete();
            return response($delete_problem->all());
        }
    }

    public function add_order(order $order_obj)
    {
        $this->validate(request(), [
            'customer_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'device_name' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'problem_price' => 'numeric',
            'imei_no' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
            'status_id' => 'required',
            'advance' => 'required|numeric',
            'balance' => 'numeric'
        ]);

        return $order_obj->set_order();
    }

    public function update()
    {
        $this->validate(request(), [
            'customer_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'device_name' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'problem_price' => 'numeric',
            'imei_no' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
            'status_id' => 'required',
            'advance' => 'required|numeric',
            'balance' => 'numeric'
        ]);
        
        $id = request('order_id');
        $cus_id = request('customer_id');
        $cat_id = request('category_id');
        $brand_id = request('brand_id');
        $device_name = request('device_name');
        $imei = request('imei_no');
        $from = request('from');
        $to = request('to');
        $status_id = request('status_id');
        $total = request('total');
        $advance = request('advance');
        $balance = request('balance');

        
        order::where('id', '=', $id)->update(array('customer_id' => $cus_id, 'category_id' => $cat_id, 'brand_id' => $brand_id, 'device_name' => $device_name, 'imei_no' => $imei, 'from' => $from, 'to' => $to, 'status_id' => $status_id, 'total' => $total, 'advance' => $advance, 'balance' => $balance));

        problem_and_price::where('order_id', '=', $id)->delete();

        $problems = request(['group-c']);
        
        if($problems['group-c'] != null)
        {
            foreach ($problems as $fields) 
            {
                foreach ($fields as $value) 
                {
                    foreach ($value as $keys => $values) 
                    {
                        if($keys == 'problem')
                            $problem = $values;
                        else
                            $problem_price = $values;
                    }

                    problem_and_price::create(['problem' => $problem, 'price' => $problem_price, 'order_id' => $id]);
                }
            }
        }

        return redirect('view_order')->with('message', 'Congrats! Order has been updated successfully.');
    }

    public function destroy(order $order)
    {
        return $order->delete_order();
    }
}
