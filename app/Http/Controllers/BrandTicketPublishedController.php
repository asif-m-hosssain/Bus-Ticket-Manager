<?php
// mvc done
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Models\Brand_Ticket_Published;
use Carbon\Carbon;

class BrandTicketPublishedController extends Controller
{
    public function BrandAddTicketSubmit(Request $req)
    
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

        $brandTicket = Brand_Ticket_Published::createTicket($ticketData);

        return redirect()->back();
    }


    public function BrandDeleteTicketSubmit(Request $req)
    {
        $ticketId = $req->input('ticket_delete');
        
        // Call the model to delete the ticket
        Brand_Ticket_Published::deleteTicketById($ticketId);

        return redirect()->back();
    }

    
}
