<?php

namespace App;

use App\model;

class brand extends model
{
    public function set_brand()
    {
    	// Getting File
            
            $file = request()->file('brand_image');
        
        // Upload path

            $destination_path = 'images/brand_image/';

        // Getting File extension

            $ext = $file->getClientOriginalExtension();
            
        // Renameing File
            
            $file_name = rand(0,9999) . "." . $ext; 
            
        // Uploading file to given path

            $full_path = $file->storeAs($destination_path, $file_name, 'uploads');

        // Inserting into DB

            try 
            { 
                brand::create(['brand_name' => request('brand_name'), 'brand_image' => $full_path]);

                session()->flash('message', "Congrats! Your Brand has been added successfully.");

                session(['num_of_brands' => brand::count()]);
            } 
            catch(\Illuminate\Database\QueryException $ex)
            { 
                session()->flash('exception', "Error: " . "Brand already Exists");
            }

            return back();
    }

    public function delete_brand()
    {
        $brand_id = request('brand_del_id');
        $brand_name = request('brand_del_name');

        try 
        {
            brand::where('id', '=', $brand_id)->delete();
            session()->flash('message', "Congrats! Brand '$brand_name' has been Deleted successfully.");
            session(['num_of_brands' => brand::count()]);
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Brand, some orders are against this one.");
        }

        return redirect('view_brand');
    }
}
