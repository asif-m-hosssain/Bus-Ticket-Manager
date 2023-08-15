@extends('layouts.app')

@section('content')
    <h1 class="text-center">PRINTABLE TICKET</h1>
    
    <!-- checking for empty array -->
    @if($tickets)
        <h2 class="text-center">Ticket Summary</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Ticket ID</th>
                    <th class="text-center">Customer Name</th>
                    <th class="text-center">Bus Company ID</th>
                    <th class="text-center">Bus Company Name</th>
                    <th class="text-center">Total Ticket Price</th>
                    <th class="text-center">Seat Count</th>
                    <th class="text-center">Seat Numbers</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $item)
                    <tr>
                        <td class="text-center">{{ $item['TicketID'] }}</td>
                        <td class="text-center">{{ $item['customer_name'] }}</td>
                        <td class="text-center">{{ $item['bus_comp_id'] }}</td>
                        <td class="text-center">{{ $item['bus_comp_name'] }}</td>
                        <td class="text-center">{{ $item['total_price'] }}</td>
                        <td class="text-center">{{ count(unserialize($item['seats'])) }}</td>
                       
                        <td>
                                @foreach( unserialize($item['seats']) as $i)
                                    <p class="text-center"> {{ $i}}</p>           
                                @endforeach
                        </td>
                    </tr>
                @endforeach
        
            </tbody>
        </table>
    
    @else
        <p class="text-center">No ticket information available.</p>
    @endif
    <!-- checking for empty array -->
    @if($detailedCartItems)
        <h2 class="text-center">Food Summary</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Item Name</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Total Quantity</th>
                    <th class="text-center">Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailedCartItems as $item)
                    <tr>
                        <td class="text-center">{{ $item['name'] }}</td>
                        <td class="text-center">{{ $item['price'] }} TK</td>
                        <td class="text-center">{{ $item['quantity'] }}</td>
                        <td class="text-center">{{ $item['total'] }} TK</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No food information available.</p>
    @endif

  
    <div class="d-flex justify-content-center mt-4">
        <div class="card">
            <div class="card-body">       
                GRAND TOTAL (BDT): {{ collect($detailedCartItems)->sum('total') + collect($tickets)->sum('total_price') }} TK
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        <button class="btn btn-outline-success" onclick="window.print()">
            PRINT
        </button>
    </div>

    <hr>
    <h6 class="text-center"> Thankyou for using EasyGO</h6>
   
@endsection
