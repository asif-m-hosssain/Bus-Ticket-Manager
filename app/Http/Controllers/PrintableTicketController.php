<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintableTicketController extends Controller
{
    public function index(Request $request)
    {
        $tickets = unserialize(base64_decode($request->input('tickets')));
        $detailedCartItems = unserialize(base64_decode($request->input('detailedCartItems')));
        
        return view('printable-ticket', compact('tickets', 'detailedCartItems'));
    }
}
