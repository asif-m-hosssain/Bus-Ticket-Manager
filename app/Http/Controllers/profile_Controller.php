<?php
// mvc done
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


class profile_Controller extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function show_profile()
    {   
        $user = Auth::user();
        $userType = $user->role;
        
        if($userType == 'Admin'){
            return view('admin_dashboard', compact('user'));
        } elseif($userType=='Brand'){
            return view('bus_profile', compact('user'));
        } elseif($userType=='Customer'){
            return view('customer_profile', compact('user'));
        } else {
            return redirect()->back();
        }
    

    }

    public function edit_profile()
    {   
        $user = Auth::user();
        $userType = $user->role;
        $all_roles = ["Customer","Brand"];
        if($userType=='Brand'){
            return view('profile_edit', compact('user','all_roles'));
        } elseif($userType=='Customer'){
            return view('profile_edit', compact('user','all_roles'));
        } else {
            return redirect()->back();
        }
    

    }

    public function profile_update(Request $req)
    {
        $user = Auth::user();
        $user->name = $req->name;
        $user->save();
        return redirect()->back();
    }
}