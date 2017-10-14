<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index_add()
    {
        $update_cus = false;
        if(request('customer_edit_id'))
            $update_cus = true;

        $customer_id = request('customer_edit_id');
        $customer_edit = customer::where('id', '=', $customer_id)->get();

        return view('add_customer', compact('customer_edit', 'customer_id', 'update_cus'));
    }
    public function index_view()
    {
        $customers = customer::all();
        session(['num_of_cus' => customer::count()]);
        return view('/view_customer', compact('customers'));
    }

    public function add_customer(customer $customer_obj)
    {
        $this->validate(request(), [
            'customer_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'customer_email' => 'required|email',
            'customer_contact' => 'required|numeric',
            'customer_address' => 'required',
        ]);

        return $customer_obj->set_customer();
    }

    public function destroy(customer $customer_obj)
    {
        return $customer_obj->delete_customer();
    }

    public function update()
    {
        $this->validate(request(), [
            'customer_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'customer_email' => 'required|email',
            'customer_contact' => 'required|numeric',
            'customer_address' => 'required',
        ]);
        
        $id = request('cus_id');
        $name = request('customer_name');
        $email = request('customer_email');
        $contact = request('customer_contact');
        $address = request('customer_address');

        customer::where('id', '=', $id)->update(array('customer_name' => $name, 'customer_email' => $email, 'customer_contact' => $contact, 'customer_address' => $address));

        return redirect('view_customer')->with('message', 'Congrats! New details has been updated successfully.');
    }
}
