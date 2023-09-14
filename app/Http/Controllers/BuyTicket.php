<?php
// mvc done d
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
use App\Models\CartItem;

class BuyTicket extends Controller
{
    public function showTickets(Request $req) // fetching the required user creds and routes upon request
    {   

        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        $allRoutes = bus_routes::all(); //custom model::function 
        
        $tickets = Brand_Ticket_Published::getAlltickets(); //custom model::function 
        

        
        if($req){ // fetching route info

            $from = $req-> Start_RouteName;
            $to = $req-> Destination_RouteName;
            $date = $req-> Start_Time;
            
            $tickets = Brand_Ticket_Published::getRequiredTickets($from,$to); //custom model::function
        }else{
            
        }
        
        $userType = Auth::user()->role;
        
        
        if($userType=='Customer' || $userType == 'Admin'){
            return view('buying_ticket_catalogue',compact('allRoutes','tickets')); //returning view file with ('allRoutes','tickets')
        }
        else{
             
            return Redirect::back();
        }
    }


    public function select_seats(Request $req)
    {
        
        
        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $userType = Auth::user()->role;
        $TicketID = $req-> ticket_id;
        
        
        $Ticket = Brand_Ticket_Published::getTicketsbyID($TicketID);
        
        $b_comp_ticket_author_name = $Ticket->b_comp_ticket_author_name;
        $b_comp_ticket_author_id = $Ticket->b_comp_ticket_author_id;
        

        $empty_seat = $Ticket->empty_seats;
        $empty_seat = unserialize($empty_seat);
        


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
        
        
        $seats = $req-> seat;
        
            


        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        
        // saving data
        $data = new CustomerBuyTicket;
        $data -> customer_id = $author_id;
        $data -> customer_name = $authod_name;

        // getting date
        $Ticket = Brand_Ticket_Published::getTicketsbyID($req -> TicketID);
        
        $b_comp_ticket_date = $Ticket->b_comp_ticket_date;
        // getting date ends

        $single_ticket_price = $Ticket->b_comp_ticket_price;
        
        
        $seats = $req-> seat;
        
        
        $seat_count = count($seats);
        $total_price = $single_ticket_price * $seat_count;
        

        $data -> TicketID = $req -> TicketID;
        $data -> bus_comp_id = $req -> b_comp_ticket_author_id;
        $data -> bus_comp_name = $req -> b_comp_ticket_author_name;
        $data -> number_of_seats = $req-> empty_seat;
        $data -> b_comp_ticket_date = $b_comp_ticket_date;
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


        

        if ($Ticket) {
            
           
        
            
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
        
        

        //-------------------------------------------------------------------------------------------------------------
        // to return back to cart again
        $userId = Auth::id();
        
        //Fetch cart items for the authenticated logged in  user
        
        $cartItems = CartItem::fetch_cart_items($userId);

        //Empty array initialization to store the cart items details and info
        $detailedCartItems = [];

        //Looping through each cart item and fetching the associated shopping item info 
        foreach ($cartItems as $cartItem) {
            $shoppingItem = $cartItem->shoppingItem;

            //Array creation with the cart item info
            $detailedCartItem = [
                'name' => $shoppingItem->name,
                'price' => $shoppingItem->price,
                'quantity' => $cartItem->quantity,
                'total' => $shoppingItem->price * $cartItem->quantity,
            ];

            //Add the detailed cart item to the array
            $detailedCartItems[] = $detailedCartItem; //is it redundent?
        }

        // ticket details
        
        $tickets = CustomerBuyTicket::getCustomerTicketsByID($userId);
        
        // ticket details ends
        

        //Pass the detailed cart items to the cart view
        return view('shopping-items.cart', compact('detailedCartItems','tickets'));
    }
}