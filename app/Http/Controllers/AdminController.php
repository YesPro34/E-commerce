<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
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
    public function view_product(){
        $categories = Category::all();
        return view('admin.product',compact("categories"));
    }
    public function add_product(Request $request){
        
        $product = new Product();
        $product->title =  $request->title;
        $product->description =  $request->description;
        $product->price =  $request->price;
        $product->quantity =  $request->quantity;
        $product->category =  $request->category;
        $product->discount_price =  $request->discount_price;
        $image =  $request->image;
        $imagename = time().".".$image->getClientOriginalExtension(); 
        $request->image->move('product',$imagename);
        $product->image =  $imagename;

        $product->save();
        return redirect()
        ->back()
        ->with("message","product added successfully");
    }
}
