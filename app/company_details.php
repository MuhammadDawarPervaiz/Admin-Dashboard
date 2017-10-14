<?php

namespace App;

use App\model;

class company_details extends model
{
    public function set_details()
    {
    	// Getting File

            $file_logo = request()->file('company_logo');
            $file_banner = request()->file('banner_printing');
        
        // Upload path

            $destination_path_logo = 'images/logo_image/';
            $destination_path_banner = 'images/banner_image/';

        // Getting File extension

            $ext_logo = $file_logo->getClientOriginalExtension();
            $ext_banner = $file_banner->getClientOriginalExtension();
            
        // Renameing File
            
            $file_name_logo = "logo." . $ext_logo;
            $file_name_banner = "banner." . $ext_banner; 
            
        // Uploading file to given path

            $full_path_logo = $file_logo->storeAs($destination_path_logo, $file_name_logo, 'uploads');
            $full_path_banner = $file_banner->storeAs($destination_path_banner, $file_name_banner, 'uploads');

        // Inserting into DB

            try 
            { 
                company_details::create(['logo_image' => $full_path_logo, 'banner_image' => $full_path_banner]);

                session()->flash('message', "Congrats! Your Images has been added successfully.");
            } 
            catch(\Illuminate\Database\QueryException $ex)
            { 
                session()->flash('message', "Congrats! Your Images has been Updated successfully.");
            }

            return back();
    }
}
