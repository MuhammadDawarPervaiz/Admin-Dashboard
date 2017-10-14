<?php

namespace App\Http\Controllers;

use App\company_details;
use Illuminate\Http\Request;

class CompanyDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    public function index_general()
    {
        return view("general_settings");
    }
    public function create_general(company_details $details_obj)
    {
        $this->validate(request(), [
            'company_logo' => 'required|mimes:png',
            'banner_printing' => 'required|mimes:png',
        ]);

        return $details_obj->set_details();
    }
    public function index_user()
    {
        return view("user_settings");
    }
}
