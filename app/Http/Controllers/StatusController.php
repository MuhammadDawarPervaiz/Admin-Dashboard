<?php

namespace App\Http\Controllers;

use App\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index_add()
    {
        $update_status = false;
        if(request('status_edit_id'))
            $update_status = true;

        $status_id = request('status_edit_id');
        $status_edit = status::where('id', '=', $status_id)->get();

        return view('/add_status', compact('status_edit', 'status_id', 'update_status'));
    }
    
    public function index_view()
    {
        $statuses = status::all();
        session(['num_of_statuses' => status::count()]);
        return view('/view_status', compact('statuses'));
    }

    public function add_status(status $status_obj)
    {
        $this->validate(request(), [
            'status' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'description' => 'required|alpha',
        ]);

        return $status_obj->set_status();
    }

    public function default_status(Request $def) 
    {
        if($def->ajax())
        {
            status::where('flag', '=', 1)->update(array('flag' => 0));
            status::where('id', '=', $def->id)->update(array('flag' => 1));
            return response($def->all());
        }
    }

    public function update()
    {
        $this->validate(request(), [
            'status' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'description' => 'required|alpha',
        ]);

        $id = request('status_id');
        $name = request('status');
        $description = request('description');
        $flag = request('flag');
        $color = request('color');

        status::where('id', '=', $id)->update(array('status' => $name, 'description' => $description, 'flag' => $flag, 'color' => $color));

        return redirect('view_status')->with('message', 'Congrats! New details has been updated successfully.');
    }

    public function destroy(status $status)
    {
        return $status->delete_status();
    }
}
