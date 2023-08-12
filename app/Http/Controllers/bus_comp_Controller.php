<?php
// mvc done
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

    public function index()
    {
        $userType = Auth::user()->role;

        if ($userType == 'Brand' || $userType == 'Admin') {
            $author_id = Auth::user()->id;
            $allRoutes = bus_routes::all();
            $brandSpecifiedTicket = Brand_Ticket_Published::getActiveTicketsForAuthor($author_id);
            // $brandSpecifiedTicket = Brand_Ticket_Published::where('b_comp_ticket_author_id', $author_id)
            //     ->where('b_comp_ticket_date', '>', Carbon::now())
            //     ->where('b_comp_ticket_seat', '>', 0)
            //     ->get();
            $brandSpecifiedExpiredTicketDate = Brand_Ticket_Published::getBrandSpecifiedExpiredTicketDate($author_id);
            // $brandSpecifiedExpiredTicketDate = Brand_Ticket_Published::where('b_comp_ticket_author_id', $author_id)
            //     ->where('b_comp_ticket_date', '<', Carbon::now())
            //     ->get();
            
            $brandSpecifiedExpiredTicketSeat = Brand_Ticket_Published::getbrandSpecifiedExpiredTicketSeat($author_id);
            // $brandSpecifiedExpiredTicketSeat = Brand_Ticket_Published::where('b_comp_ticket_author_id', $author_id)
            //     ->where('b_comp_ticket_seat', '=', 0)
            //     ->get();

            $allticket = []; // You can fetch this data from the model if needed
            $numberofticket = count($allticket);
            $totalrevenue = 0;
            // $tickets = CustomerBuyTicket::getCustomerTicketsByID($userId);
            $soldtickets = CustomerBuyTicket::getAllTicketsSoldByTheCompanyID($author_id);


            foreach ($allticket as $item) {
                $totalrevenue += $item->totalprice;
            }

            return view('bus_comp.bus_comp', compact('allRoutes', 'brandSpecifiedTicket', 'brandSpecifiedExpiredTicketDate', 'brandSpecifiedExpiredTicketSeat', 'allticket', 'numberofticket', 'totalrevenue', 'soldtickets'));
        } else {
            return Redirect::back();
        }
    }

    public function cancel_tickets(Request $req)
    {
        // dd($req -> all(),"doesit work?");
        $customer_bought_ticketId = $req->input('customer_bought_ticket_id');
        $booked_seats = $req->input('booked_seats');
        
        // Call the model to delete the ticket
        CustomerBuyTicket::deleteCustomerBuyTicketById($customer_bought_ticketId);

        // make the seats empty again
        $TicketID = $req->input('TicketID');
        $Ticket = Brand_Ticket_Published::getTicketsbyID($TicketID);
        $all_empty_seats = $Ticket-> empty_seats;
        Brand_Ticket_Published::makeSeatsEmptyAgain($booked_seats,$all_empty_seats,$TicketID);
        // dd($req -> all(),$booked_seats,$all_empty_seats);
        return redirect()->back();
    }
}
