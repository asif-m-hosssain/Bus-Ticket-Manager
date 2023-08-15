<?php
 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ShoppingItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand_Ticket_Published;//to show the tickets for which foods will be provided

class AddShoppingItemController extends Controller
{   
    public function showMenu()
    {   
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;

        
        $allshoppingitems = ShoppingItem::where('bus_comp_id', $author_id)->get();
        $brandSpecifiedTicket = Brand_Ticket_Published::getActiveTicketsForAuthor($author_id);
       
        
        
        
        
        return view('menu',compact('allshoppingitems', 'brandSpecifiedTicket'));
        
    }

    public function addToMenu(request $req)
    {
        
        
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        
        
        $data = ShoppingItem::create([
            'name' => $req->input('item_name'),
            'price' => $req->input('item_Price'),
            'ticket_id' => $req->input('ticket_id'),
            'bus_comp_id' => $author_id,
            'bus_comp_name' => $author_name,
        ]);
        return redirect()->back();
        
    }
}
