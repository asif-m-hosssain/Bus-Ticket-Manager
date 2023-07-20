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


    public function funcEditTickets(request $req)
    {
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        $allRoutes = DB::select("select * from `bus_routes`");
        $brandSpecifiedTicket = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_seat','>',0)->get();
        // dd($req -> all(), brandSpecifiedTicket);
        return view('bus_comp.ticket_edit',compact('allRoutes','brandSpecifiedTicket'));

    }
    public function funcSubmitEditedTickets(request $req)
    {
        
        // dd($req -> all(),"doesit work?");
        $author_id = Auth::user()->id;
        $authod_name = Auth::user()->name;
        $data = new Brand_Ticket_Published;
        $data-> id = $req->input("ticket_edit");
        DB::delete('delete from bus_company_published_ticket where id = ?',[$req->input("ticket_edit")]);
        $data-> b_comp_ticket_author_id =$author_id;
        
        $data -> b_comp_ticket_from = $req->input("Start_RouteName");
        $data -> b_comp_ticket_to = $req->input("Destination_RouteName");
        $data -> b_comp_ticket_seat = $req->input("No_Seats");
        $data -> b_comp_ticket_date = $req->input("Start_Time");
        $data -> b_comp_ticket_price = $req->input("Ticket_Price");
        $data -> b_comp_ticket_author_name = $authod_name;
        $data -> save();
        return redirect()->back();
    }
}

