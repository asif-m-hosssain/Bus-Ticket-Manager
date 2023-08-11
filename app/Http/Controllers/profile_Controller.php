<?php
// mvc done
namespace App\Http\Controllers;
use ConfirmsPasswords;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function profile_update(Request $request)
    {
        // dd($req -> all(),"doesit work?");
        $user = Auth::user();
        if ($request->has('name')) {
            $user->name = $request->name;
            $user->save();
        }else {
            
        }

        if ($request->has('email')) {
            $user->email = $request->email;
            $user->save();
        }else {
            
        }


        // $user->name = $req->name;
        


        // if ($request->has('email')) {
        //     $hashedPassword = $user->password;

        //     // Get the password provided by the user in the request
        //     $providedPassword = $request-> password;

        //     // Perform the password confirmation
        //     if (Hash::check($providedPassword, $hashedPassword)) {
        //         // Password is confirmed, proceed with updating the profile
        //         $user->password = Hash::make($request -> password);
        //         // Your update logic here
        //     } else {
        //         // Password is not confirmed, return an error response or redirect back
        //         return back()->withErrors(['password' => 'Password confirmation failed']);
        //     }
            


        // }else {
            
        // }

        // confirming password
        
        $user->save();

        return redirect()->back();
    }




    
    public function change_pass()
    {   
        $user = Auth::user();
        $userType = $user->role;
        $all_roles = ["Customer","Brand"];
        if($userType=='Brand'){
            return view('change_pass', compact('user','all_roles'));
        } elseif($userType=='Customer'){
            return view('change_pass', compact('user','all_roles'));
        } else {
            return redirect()->back();
        }
    

    }

    public function update_password(Request $request)
    {
        
        $user = Auth::user();
        


        // $user->name = $req->name;
        


    
        $hashedPassword = $user->password;
        
        // Get the password provided by the user in the request
        $providedPassword = $request-> current_password;
        $provided_New_Password = $request-> new_password;
        $providedConfirmationPassword = $request-> password_confirmation;
        
        // Perform the password confirmation
        // Hash::check($providedPassword, $hashedPassword)
        if (Hash::check($providedPassword, $hashedPassword)) {
            // dd($request -> all(),"match");
            // Password is confirmed, proceed with updating the profile
            $user->password = Hash::make($request -> new_password);
            
        }
        
        
        else {
            // dd($request -> all(),"didn't macth?");
            // Password is not confirmed, return an error response or redirect back
            return redirect()->back()->withErrors(['password' => 'Password confirmation failed. You gave wrong password']);
        }
        if ($provided_New_Password != $providedConfirmationPassword){
            // dd($request -> all(),"confirm?");
            return redirect()->back()->withErrors(['password_confirmation' => 'Check the confirm password']);

        }
        


        

        // confirming password
        
        $user->save();

        return redirect()->back();
    }




}