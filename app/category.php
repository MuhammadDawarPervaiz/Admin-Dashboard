<?php

namespace App;

use App\model;

class category extends model
{
    public function set_category()
    {
    	// Getting File
            
            $file = request()->file('category_image');
        
        // Upload path

            $destination_path = 'images/category_image/';

        // Getting File extension

            $ext = $file->getClientOriginalExtension();
            
        // Renameing File
            
            $file_name = rand(0,9999) . "." . $ext; 
            
        // Uploading file to given path

            $full_path = $file->storeAs($destination_path, $file_name, 'uploads');

        // Inserting into DB

            try 
            { 
                category::create(['category_name' => request('category_name'), 'category_image' => $full_path]);

                session()->flash('message', "Congrats! New Category has been added successfully.");

                session(['num_of_cat' => category::count()]);
            } 
            catch(\Illuminate\Database\QueryException $ex)
            { 
                session()->flash('exception', "Error: " . "Category already Exists");
            }

            return back();
    }

    public function delete_category()
    {
        $cat_id = request('category_del_id');
        $cat_name = request('category_del_name');

        try 
        {
            category::where('id', '=', $cat_id)->delete();
            session()->flash('message', "Congrats! Category '$cat_name' has been Deleted successfully.");
            session(['num_of_cat' => category::count()]);
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            session()->flash('exception', "Sorry! " . "Cannot delete this Category, some orders are against this one.");
        }

        return redirect('view_category');
    }
}
