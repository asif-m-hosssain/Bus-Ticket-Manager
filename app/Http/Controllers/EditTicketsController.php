<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\bus_routes;
use App\Models\bus_company_published_ticket;
use Illuminate\Support\Facades\Redirect;
use App\Models\Brand_Ticket_Published;

class EditTicketsController extends Controller

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


     public function funcEditTickets(Request $req)
     {
         $author_id = Auth::user()->id;
         $brandSpecifiedTicket = Brand_Ticket_Published::getActiveTicketsForAuthor($author_id);
         $allRoutes = bus_routes::all();
         
 
         return view('bus_comp.ticket_edit', compact('brandSpecifiedTicket','allRoutes'));
     }
     public function funcSubmitEditedTickets(Request $req)
     {
         $ticketId = $req->input('ticket_edit');
         $ticketData = $this->prepareTicketData($req);
 
         // Delete the old ticket
         Brand_Ticket_Published::deleteTicketById($ticketId);
 
         // Create a new ticket with updated data
         Brand_Ticket_Published::createTicket($ticketData);
 
         return redirect()->back();
     }

     private function prepareTicketData(Request $req)
    {
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;

        $ticketData = [
            'b_comp_ticket_author_id' => $author_id,
            'b_comp_ticket_from' => $req->input('Start_RouteName'),
            'b_comp_ticket_to' => $req->input('Destination_RouteName'),
            'b_comp_ticket_seat' => $req->input('No_Seats'),
            'b_comp_ticket_date' => $req->input('Start_Time'),
            'b_comp_ticket_price' => $req->input('Ticket_Price'),
            'b_comp_ticket_author_name' => $author_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        // seats handling (same as before)

        return $ticketData;
    }
}

