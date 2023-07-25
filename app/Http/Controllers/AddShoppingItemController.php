<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShoppingItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AddShoppingItemController extends Controller
{   
    public function showMenu()
    {   
        $author_id = Auth::user()->id;
        $author_name = Auth::user()->name;
        $allshoppingitems = DB::select("select * from `shopping_items`");
       
        
        
        
        
        return view('menu',compact('allshoppingitems'));
        
    }

    public function addToMenu(request $req)
    {
        // dd($req -> all(),"doesit work?");
        
        // $author_id = Auth::user()->id;
        $data = new ShoppingItem;
        $data -> name = $req->input("item_name");
        $data -> price = $req->input("item_Price");
        $data -> save();
        return redirect()->back();
        // $user = Auth::user();
    
        // // Attach the shopping item to the user's cart with quantity 1
        // $user->cartItems()->attach($shoppingItem, ['quantity' => 1]);

        // return redirect()->back()->with('success', 'Item added to cart successfully.');
    }
}
