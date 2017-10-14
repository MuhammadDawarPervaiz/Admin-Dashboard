<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index_add()
    {
        $update_cat = false;
        if(request('category_edit_id'))
            $update_cat = true;

        $category_id = request('category_edit_id');
        $category_edit = category::where('id', '=', $category_id)->get();

        return view('/add_category', compact('category_edit', 'category_id', 'update_cat'));
    }
    public function index_view()
    {
        $categories = category::all();
        session(['num_of_cat' => category::count()]);
        return view('/view_category', compact('categories'));
    }

    public function add_category(category $category_obj)
    {
        $this->validate(request(), [
            'category_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'category_image' => 'required|image',
        ]);

        return $category_obj->set_category();
    }

    public function update()
    {
        $this->validate(request(), [
            'category_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
            'category_image' => 'required|image',
        ]);
        
        $id = request('cat_id');
        $name = request('category_name');

        $file = request()->file('category_image');
        $destination_path = 'images/category_image/';
        $ext = $file->getClientOriginalExtension();
        $file_name = rand(0,9999) . "." . $ext; 
        $full_path = $file->storeAs($destination_path, $file_name, 'uploads');

        category::where('id', '=', $id)->update(array('category_name' => $name, 'category_image' => $full_path));

        return redirect('view_category')->with('message', 'Congrats! New details has been updated successfully.');
    }

    public function destroy(category $cat)
    {
        return $cat->delete_category();
    }
}
