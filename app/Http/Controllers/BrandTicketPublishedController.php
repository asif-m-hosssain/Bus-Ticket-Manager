<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Models\Brand_Ticket_Published;

class BrandTicketPublishedController extends Controller
{
    public function BrandAddTicketSubmit(Request $req)
    {
        // print_r($req->input());

        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $data = new Brand_Ticket_Published;
        $data->b_comp_ticket_author_id = $author_id;
        $data -> b_comp_ticket_from = $req->input("Start_RouteName");
        $data -> b_comp_ticket_to = $req->input("Destination_RouteName");
        $data -> b_comp_ticket_seat = $req->input("No_Seats");
        $data -> b_comp_ticket_date = $req->input("Start_Time");
        $data -> b_comp_ticket_price = $req->input("Ticket_Price");
        $data -> b_comp_ticket_author_name = $authod_name;
        $data -> save();
        return redirect()->back();
    }
    public function BrandDeleteTicketSubmit(request $req)
    {
        

        DB::delete('delete from bus_company_published_ticket where id = ?',[$req->input("ticket_delete")]);
        return redirect()->back();

    }

    
}
