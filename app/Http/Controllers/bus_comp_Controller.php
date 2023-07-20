<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\bus_routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerTicketStorage;
use App\Models\bus_company_published_ticket;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class bus_comp_Controller extends Controller
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
    public function index()
    {   
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        $allRoutes = DB::select("select * from `bus_routes`");
        $brandSpecifiedTicket = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_seat','>',0)->get();

        $brandSpecifiedExpiredTicketDate = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','<',Carbon::now())->get();
        $brandSpecifiedExpiredTicketSeat = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_seat','=',0)->get();
        
        
        $allticket = [];
        $userType = Auth::user()->role;
        $numberofticket=0;
        $totalrevenue=0;
        foreach($allticket as $item)
        {
            $numberofticket++;
        }

        foreach($allticket as $item)
        {
            $totalrevenue+=$item->totalprice;
        }
        
        if($userType=='Brand' || $userType == 'Admin'){
            return view('bus_comp.bus_comp',compact('allRoutes','brandSpecifiedTicket','brandSpecifiedExpiredTicketDate','brandSpecifiedExpiredTicketSeat','allticket','numberofticket','totalrevenue'));
        }
        else{
             
            return Redirect::back();
        }
    }
}
