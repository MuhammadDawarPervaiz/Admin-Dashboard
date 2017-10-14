<?php

namespace App;

use App\model;

class problem_and_price extends model
{
    public function add_problem_and_price()
    {
    	$orders = order::latest()->select('id')->limit(1)->get();
    	foreach($orders as $order)
    	{
    		$orders = $order->id + 1;
    	}
    	if(!count($orders))
    		$orders = 1;

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

		            problem_and_price::create(['problem' => $problem, 'price' => $problem_price, 'order_id' => $orders]);
		        }
		    }
	    }
    }
}