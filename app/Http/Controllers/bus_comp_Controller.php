<?php
// mvc done
// this is for bus company. It shows the page ticketing.
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\bus_routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand_Ticket_Published;
use App\Models\CustomerBuyTicket;
use Illuminate\Support\Facades\Redirect;

class bus_comp_Controller  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() //it sends all the data that are required to load the page
    {
        $userType = Auth::user()->role;

        if ($userType == 'Brand' || $userType == 'Admin') {
            $author_id = Auth::user()->id;
            $allRoutes = bus_routes::all();
            $brandSpecifiedTicket = Brand_Ticket_Published::getActiveTicketsForAuthor($author_id); //it is showing the available tickets. meaning not expired tickets. 
            
            $brandSpecifiedExpiredTicketDate = Brand_Ticket_Published::getBrandSpecifiedExpiredTicketDate($author_id); //it is showing the expired  tickets.
            
            
            $brandSpecifiedExpiredTicketSeat = Brand_Ticket_Published::getbrandSpecifiedExpiredTicketSeat($author_id); //not exactly sure. most likely redundant
            

            
            $soldtickets = CustomerBuyTicket::getAllTicketsSoldByTheCompanyID($author_id);


            
            return view('bus_comp.bus_comp', compact('allRoutes', 'brandSpecifiedTicket', 'brandSpecifiedExpiredTicketDate', 'soldtickets'));
        } else {
            return Redirect::back();
        }
    }

    public function cancel_tickets(Request $req)
    {
        
        $customer_bought_ticketId = $req->input('customer_bought_ticket_id');
        $booked_seats = $req->input('booked_seats');
        
        // Call the model to delete the ticket
        CustomerBuyTicket::deleteCustomerBuyTicketById($customer_bought_ticketId);

        // make the seats empty again
        $TicketID = $req->input('TicketID');
        $Ticket = Brand_Ticket_Published::getTicketsbyID($TicketID);
        $all_empty_seats = $Ticket-> empty_seats;
        Brand_Ticket_Published::makeSeatsEmptyAgain($booked_seats,$all_empty_seats,$TicketID);
        
        return redirect()->back();
    }
}
