<?php

namespace App\Http\Controllers;

use App\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index_add()
    {
        $update_brand = false;
        if(request('brand_edit_id'))
            $update_brand = true;

        $brand_id = request('brand_edit_id');
        $brand_edit = brand::where('id', '=', $brand_id)->get();

        return view('/add_brand', compact('brand_edit', 'brand_id', 'update_brand'));
    }
    public function index_view()
    {
        $brands = brand::all();
        session(['num_of_brands' => brand::count()]);
        return view('/view_brand', compact('brands'));
    }

    public function add_brand(brand $brand_obj)
    {
        $this->validate(request(), [
            'brand_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'brand_image' => 'required|image',
        ]);

        return $brand_obj->set_brand();
    }

    public function update()
    {
        $this->validate(request(), [
            'brand_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'brand_image' => 'required|image',
        ]);
        
        $id = request('brand_id');
        $name = request('brand_name');

        $file = request()->file('brand_image');
        $destination_path = 'images/brand_image/';
        $ext = $file->getClientOriginalExtension();
        $file_name = rand(0,9999) . "." . $ext; 
        $full_path = $file->storeAs($destination_path, $file_name, 'uploads');
        
        brand::where('id', '=', $id)->update(array('brand_name' => $name, 'brand_image' => $full_path));

        return redirect('view_brand')->with('message', 'Congrats! New details has been updated successfully.');
    }

    public function destroy(brand $brand)
    {
        return $brand->delete_brand();
    }
}
