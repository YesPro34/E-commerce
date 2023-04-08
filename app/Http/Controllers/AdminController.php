<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    //


    public function view_category(){
        $categories = Category::all();
        return view("admin.category",compact("categories"));
    }

    public function add_category(Request $request){
        $category = new Category();
        $category->category_name =  $request->name;
        $category->save();
        return redirect()
        ->back()
        ->with("message","category added successfully");
    }


    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with("message","category deleted successfully");;
    }
}
