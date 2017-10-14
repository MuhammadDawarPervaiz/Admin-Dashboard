<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
    	return view('index');
    }

	public function login(Request $request)
    {
    	// Validate the form data

    		$this->validate($request, [
	            'password' => 'required'
	        ]);

    	// Attempt to log the user in

			if(Auth::guard('admin')->attempt(['password' => $request->password], $request->remember))
			{
				// If successful, then redirect to their intended location

					return redirect()->intended(route('admin.dashboard'));
			}

    	// If unsuccessful, then redirect back to the login

			return redirect()->back()->with('message', 'Login Failed: Invalid Password');
    }    
}
