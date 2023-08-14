<?php
// mvc done
//customer can select tickets.
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
// use App\Models\CustomerTicketStorage;
use App\Models\show_rating;
use App\Models\User;
use App\Models\CustomerBuyTicket;
use App\Models\Brand_Ticket_Published;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\bus_routes;

class BuyTicket extends Controller
{
    public function showTickets(Request $req)
    {   

        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        $allRoutes = bus_routes::all();
        // $brandSpecifiedTicket = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_seat','>',0)->get();
        // $tickets = bus_company_published_ticket::where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_seat','>',0)->get();
        $tickets = Brand_Ticket_Published::getAlltickets();
        // $brandSpecifiedExpiredTicketDate = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','<',Carbon::now())->get();
        // $brandSpecifiedExpiredTicketSeat = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_seat','=',0)->get();
        // dd($req -> all(),"doesit work?");

        
        if($req){

            $from = $req-> Start_RouteName;
            $to = $req-> Destination_RouteName;
            $date = $req-> Start_Time;
            // $tickets = bus_company_published_ticket::where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_from',$from)->where('b_comp_ticket_to',$to)->where('b_comp_ticket_seat','>',0)->get();
            $tickets = Brand_Ticket_Published::getRequiredTickets($from,$to);
        }else{
            // $tickets = bus_company_published_ticket::where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_seat','>',0)->get();
        }
        
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
        
        // $Ticket = bus_company_published_ticket::where('id', $TicketID)->first();
        
        $Ticket = Brand_Ticket_Published::getTicketsbyID($TicketID);

        $b_comp_ticket_author_name = $Ticket->b_comp_ticket_author_name;
        $b_comp_ticket_author_id = $Ticket->b_comp_ticket_author_id;

        $empty_seat = $Ticket->empty_seats;
        $empty_seat = unserialize($empty_seat);
        // dd($req -> all(),$empty_seat);


        $Empty_seat = 36;
        if($userType=='Customer'){
            return view('seat_status',compact('Ticket','TicketID','Empty_seat','b_comp_ticket_author_id','b_comp_ticket_author_name','empty_seat'));
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
        
        // saving data
        $data = new CustomerBuyTicket;
        $data -> customer_id = $author_id;
        $data -> customer_name = $authod_name;


        $Ticket = Brand_Ticket_Published::getTicketsbyID($req -> TicketID);

        $single_ticket_price = $Ticket->b_comp_ticket_price;
        
        // dd($single_ticket_price);
        $seats = $req-> seat;
        // dd($seats);
        
        $seat_count = count($seats);
        $total_price = $single_ticket_price * $seat_count;
        // dd($single_ticket_price, $seat_count,$total_price);

        $data -> TicketID = $req -> TicketID;
        $data -> bus_comp_id = $req -> b_comp_ticket_author_id;
        $data -> bus_comp_name = $req -> b_comp_ticket_author_name;
        $data -> number_of_seats = $req-> empty_seat;
        $data -> cancel_ticket_request = 0; //cancel request is False

        $seats = $req-> seat;
        $seats = serialize($seats);
        $data -> seats = $seats;
        
        $data -> total_price = $total_price;//calculate
        
        $data -> save();
        // saving data ends


        $TicketID = $req-> TicketID;
        $Ticket = Brand_Ticket_Published::getTicketsbyID($TicketID);
        $all_empty_seats = $Ticket-> empty_seats;


        // $seats = unserialize($seats);
        
        // $all_empty_seats = unserialize($all_empty_seats);
        // // dd($req -> all(), $all_empty_seats);
        // for ($i = 0; $i < count($seats); $i++) {
        //     $all_empty_seats[$seats[$i]] = True;         
            
        // }
        // dd($req -> all(), $all_empty_seats);

        if ($Ticket) {
            
           
        
            
            // $all_empty_seats = serialize($all_empty_seats);
        
            
            // $Ticket->update(['empty_seats' => $all_empty_seats]);//
            $Ticket->updateEmptySeats($seats, $all_empty_seats);
            
        } else {
            
        }






        
        $allRoutes = bus_routes::all();
        $tickets = Brand_Ticket_Published::getAlltickets();
        $userType = Auth::user()->role;
        
        
        if($userType=='Customer' || $userType == 'Admin'){
            return view('buying_ticket_catalogue',compact('allRoutes','tickets'));
        }
        else{
             
            return Redirect::back();
        }
        
    }

    public function cancel_request(Request $req)
    {
        
        $cancel_request_ticket_id = $req->input('cancel_request_ticket_id');
        
        // Call the model to delete the ticket
        CustomerBuyTicket::change_cancel_request_to_true($cancel_request_ticket_id);
        // dd($req -> all());
        return Redirect::back();
    }
}