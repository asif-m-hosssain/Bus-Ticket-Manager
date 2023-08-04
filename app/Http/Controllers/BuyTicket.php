<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
// use App\Models\CustomerTicketStorage;
use App\Models\show_rating;
use App\Models\User;
use App\Models\CustomerBuyTicket;
use App\Models\bus_company_published_ticket;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class BuyTicket extends Controller
{
    public function showTickets()
    {   
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        $allRoutes = DB::select("select * from `bus_routes`");
        // $brandSpecifiedTicket = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_seat','>',0)->get();
        $tickets = bus_company_published_ticket::get();
        // $brandSpecifiedExpiredTicketDate = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','<',Carbon::now())->get();
        // $brandSpecifiedExpiredTicketSeat = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_seat','=',0)->get();
        
        
        
        $userType = Auth::user()->role;
        
        
        if($userType=='Customer' || $userType == 'Admin'){
            return view('buying_ticket_catalogue',compact('allRoutes','tickets'));
        }
        else{
             
            return Redirect::back();
        }
    }


    public function select_seats(Request $req)
    {
        
        // dd($req -> all(),"doesit work?");
        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $userType = Auth::user()->role;
        $TicketID = $req-> ticket_id;
        // dd($req -> all(),$id);
        
        $Ticket = bus_company_published_ticket::where('id', $TicketID)->first();
        $b_comp_ticket_author_name = $Ticket->b_comp_ticket_author_name;
        $b_comp_ticket_author_id = $Ticket->b_comp_ticket_author_id;
        $Empty_seat = 36;
        if($userType=='Customer'){
            return view('seat_status',compact('Ticket','TicketID','Empty_seat','b_comp_ticket_author_id','b_comp_ticket_author_name'));
        }
        else{
             
            return Redirect::back();
        }
    }



    public function submitted_seat(Request $req)
    {
        
        // dd($req -> all());
        $seats = $req-> seat;
        // foreach($seats as $item){

        //     echo $item. "  ,  ";
        // }
            


        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $data = new CustomerBuyTicket;
        // $data->b_comp_ticket_author_id = $author_id;
        $data -> customer_id = $author_id;
        $data -> customer_name = $authod_name;
        $tickets = $req-> tickets;
        // $tickets = json_decode($tickets, true);
        
        

        // dd($req -> all(), $tickets);
        // echo $tickets;
        // $data -> bus_comp_name = $req-> $tickets -> b_comp_ticket_author_name;




        $data -> bus_comp_id = $req -> b_comp_ticket_author_id;
        $data -> bus_comp_name = $req -> b_comp_ticket_author_name;
        $data -> number_of_seats = $req-> empty_seat;
        $seats = $req-> seat;
        $seats = serialize($seats);


        $data -> seats = $seats;
        $data -> total_price = "100";
        
        
       
        
        $data -> save();
        
        $allRoutes = DB::select("select * from `bus_routes`");
        
        $tickets = bus_company_published_ticket::get();
        
        
        
        
        $userType = Auth::user()->role;
        
        
        if($userType=='Customer' || $userType == 'Admin'){
            return view('buying_ticket_catalogue',compact('allRoutes','tickets'));
        }
        else{
             
            return Redirect::back();
        }
        
    }
}