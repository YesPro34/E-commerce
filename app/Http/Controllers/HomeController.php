<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{


    public function index(){
        return view('home.userpage');
    }

    
    public  function redirect(){
        // check for user type
        $userType = Auth::user()->usertype;

        if($userType == '1'){
            return view('admin.home');
        }else{
            return view('home.userpage');
        }
    }


   
}
