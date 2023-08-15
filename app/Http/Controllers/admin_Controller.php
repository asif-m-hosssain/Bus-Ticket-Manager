<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


class admin_controller extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show_profile()
    {   
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $userType = Auth::user()->role;
        $email = Auth::user()->email;
        $created_at = Auth::user()->created_at;
        $updated_at = Auth::user()->updated_at;
   
        if($userType == 'Admin'){
            return view('admin_dashboard',compact('id','name','email','updated_at','created_at','role'));
        }
        
        elseif($userType=='Brand' ){
            return view('bus_profile',compact('id','name','email','updated_at','created_at','role'));
        }
        elseif($userType=='Customer'){
            return view('customer_profile',compact('id','name','email','updated_at','created_at','role'));
        }
        else{
             
            return Redirect::back();
        }
    }

    public function profile_update(Request $req)
    {
        
        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $data = new User;
        
        $data = User::where("name", $authod_name)->first();
        
        $data -> name = $req-> name;
        
        
        $data -> save();
        return redirect()->back();
    }
}