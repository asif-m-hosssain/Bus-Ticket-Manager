<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ShoppingItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\bus_company_published_ticket;//to show the tickets for which foods will be provided

class AddShoppingItemController extends Controller
{   
    public function showMenu()
    {   
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        // $allshoppingitems = DB::select("select * from `shopping_items`");
        $allshoppingitems = ShoppingItem::where('bus_comp_id', $author_id)->get();
        $brandSpecifiedTicket = bus_company_published_ticket::where('b_comp_ticket_author_id', $author_id)->where('b_comp_ticket_date','>',Carbon::now())->where('b_comp_ticket_seat','>',0)->get();
       
        
        
        
        
        return view('menu',compact('allshoppingitems', 'brandSpecifiedTicket'));
        
    }

    public function addToMenu(request $req)
    {
        // dd($req -> all(),"doesit work?");
        
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        
        $data = new ShoppingItem;
        $data -> name = $req->input("item_name");
        $data -> price = $req->input("item_Price");
        $data -> ticket_id = $req -> ticket_id;
        $data -> bus_comp_id = $author_id;
        $data -> bus_comp_name = $author_name;

        $data -> save();
        return redirect()->back();
        // $user = Auth::user();
    
        // // Attach the shopping item to the user's cart with quantity 1
        // $user->cartItems()->attach($shoppingItem, ['quantity' => 1]);

        // return redirect()->back()->with('success', 'Item added to cart successfully.');
    }
}
