<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{


    public function index(){
        $products = Product::paginate(9);
        return view('home.userpage',compact('products'));
    }

    
    public  function redirect(){
        // check for user type
        $userType = Auth::user()->usertype;
        if($userType == '1'){
            return view('admin.home');
        }else{
            $products = Product::paginate(9);
            return view('home.userpage',compact('products'));
        }
    }


   
}
