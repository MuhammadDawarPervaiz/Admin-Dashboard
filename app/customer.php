<?php

namespace App;

use App\model;

class customer extends model
{
    public function set_customer()
    {
        try 
        { 
            customer::create(request(['customer_name', 'customer_email', 'customer_contact', 'customer_address']));

            session()->flash('message', "Congrats! New Customer has been added successfully.");

            session(['num_of_cus' => customer::count()]);
        } 
        catch(\Illuminate\Database\QueryException $ex)
        { 
            session()->flash('exception', "Error: " . "Customer with this Number '" . request('customer_contact') . "' already Exists");
        }

        if(session('add_cus'))
        {
	        session()->forget('add_cus');

	        return redirect('/add_order');
        }

        return redirect('add_customer');
    }

    public function delete_customer()
    {
        $customer_id = request('customer_del_id');
        
        try 
        {
            customer::where('id', '=', $customer_id)->delete();
            session()->flash('message', "Congrats! Customer having ID '$customer_id' has been Deleted successfully.");
            session(['num_of_cus' => customer::count()]);
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this customer, he/she has some orders in place.");
        }

        return redirect('view_customer');
    }
}
