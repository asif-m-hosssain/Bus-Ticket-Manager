<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Models\bus_routes;

use Illuminate\Support\Facades\Auth;
// use App\Models\CustomerTicketStorage;
use App\Models\show_rating;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ShowAllBusCompForRanking extends Controller
{
    public function show()
    {   
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        $allBusComp = DB::select(" SELECT * FROM `users` WHERE `role` LIKE 'Brand' ");
        // $brandSpecifiedTicket = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_seat','>',0)->get();

        // $brandSpecifiedExpiredTicketDate = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','<',Carbon::now())->get();
        // $brandSpecifiedExpiredTicketSeat = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_seat','=',0)->get();
        
        
        $allticket = [];
        $userType = Auth::user()->role;
        $numberofticket=0;
        $totalrevenue=0;
        
        if($userType=='Customer'){
            return view('all_bus_comp_view_for_ranking',compact('allBusComp'));
        }
        else{
             
            return Redirect::back();
        }
    }


    public function select_rating(Request $req)
    {
        
        // dd($req -> all(),"doesit work?");
        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $userType = Auth::user()->role;
        $company_id_to_show_rating = $req-> comp_id;
        // dd($req -> all(),$id);
        
        $company_rating = show_rating::where('bus_comp_id', $company_id_to_show_rating)->get();
        
        if($userType=='Customer'){
            return view('bus_comp_rating',compact('company_rating','company_id_to_show_rating'));
        }
        else{
             
            return Redirect::back();
        }
    }



    public function give_rating(Request $req)
    {
        
        // dd($req -> all());
        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $data = new show_rating;
        // $data->b_comp_ticket_author_id = $author_id;
        
        $data -> bus_comp_id = $req-> company_id_to_show_rating;
        $data -> customer_id = $author_id;
        $data -> review = $req-> review;
        $data -> rating = $req-> rating;
        
        // $user_info = User::where('id', $req-> company_id_to_show_rating)->get();
        $user_info = User::where('id', $req->company_id_to_show_rating)->first();
        $name = $user_info->name;
        $data -> company_name = $name;


        $data -> customer_name = $authod_name;
        // if ($user_info) {
            
            // Do something with $name, like printing it or using it in your logic
            // echo "User Name: " . $name . "<br>";
        // }
        
        // $data-> $name = user_info[0]->name;
        
        // $data = User::where("name", $authod_name)->first();
        // $user->name
        // dd($req -> all(),$user_info,"sssssssssss");
        // $data -> id = Auth::user()->id+3;
        // $data -> email = Auth::user()->email;
        // $data -> password = Auth::user()->password;
       
        
        $data -> save();
        
        $company_id_to_show_rating = $req-> company_id_to_show_rating;

        $company_rating = show_rating::where('bus_comp_id', $company_id_to_show_rating)->get();
        
        return view('bus_comp_rating',compact('company_rating','company_id_to_show_rating'));
        
        
    }
}
