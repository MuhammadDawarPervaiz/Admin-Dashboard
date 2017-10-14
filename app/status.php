<?php

namespace App;

use App\model;

class status extends model
{
    public function set_status()
    {
        try 
        { 
            status::create(request(['status', 'description', 'flag', 'color']));
        
            session()->flash('message', "Congrats! New Status has been added successfully.");

            session(['num_of_statuses' => status::count()]);
        }
        catch(\Illuminate\Database\QueryException $ex)
        { 
            session()->flash('exception', "Error: " . "Status already Exists");
        }

        return back();
    }

    public function delete_status()
    {
        $status_id = request('status_del_id');
        $status_name = request('status_del_name');

        try 
        {
            status::where('id', '=', $status_id)->delete();
            session()->flash('message', "Congrats! status '$status_name' has been Deleted successfully.");
            session(['num_of_statuses' => status::count()]);
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Status, some orders are against this one.");
        }

        return redirect('view_status');
    }
}
