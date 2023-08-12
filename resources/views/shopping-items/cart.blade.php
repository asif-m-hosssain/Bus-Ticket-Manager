@extends('layouts.app')

@section('content')
    <h1 class="text-center">CHECKOUT</h1>
    <h4 class="text-center">Thank you for using EasyGO</h4>
    <div >
    
    <!-- table to show tickets running -->



    
        
            <div class="d-flex justify-content-center">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Ticket ID</th>
                            <th>Customer Name</th>
                            <th>Bus Company ID</th>
                            <th>Bus Company Name</th>
                            <th>Seat Count</th>
                            <th>Seat Numbers</th>
                        </tr>
                    </thead>

                    
                    <!-- Fectching item  information -->
                    <tbody>

                        @foreach($tickets as $item)
                            <tr>
                                <td class="text-center">{{ $item['TicketID'] }}</td>
                                <td class="text-center">{{ $item['customer_name'] }} </td>
                                <td class="text-center">{{ $item['bus_comp_id'] }}</td>
                                <td class="text-center">{{ $item['bus_comp_name'] }} </td>
                                <td class="text-center">{{ count(unserialize($item['seats'])) }}</td>
                                <!-- <td class="text-center">{{ $item['seats'] }}</td> -->
                                <td>
                                    @foreach( unserialize($item['seats']) as $i)
                                        <p class="text-center"> {{ $i }}</p>
                                        
                                    @endforeach
                                </td>
                                <td>
                                <form action="/shopping-items" method="POST">
                                    @csrf
                                    <div class="form-group">
                                            <input type="hidden" name="bus_comp_name" value="{{ $item -> bus_comp_name}}" >
                                            <input type="hidden" name="bus_comp_id" value="{{ $item -> bus_comp_id}}" >
                                            <button onclick="saveValue(this);" name="ticket_id" value="{{ $item->TicketID }}" type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Buy Foods</button>
                                    </div>
                                </form>
                                    
                                </td>
                                <td>
                                <form action="cancel_request" method="POST">
                                    @csrf
                                    <div class="form-group">
                                            <!-- <input type="hidden" name="bus_comp_name" value="{{ $item -> bus_comp_name}}" >
                                            <input type="hidden" name="bus_comp_id" value="{{ $item -> bus_comp_id}}" > -->
                                            <button onclick="saveValue(this);" name="cancel_request_ticket_id" value="{{ $item->id }}" type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Ticket Cancel request</button>
                                            @if($item->cancel_ticket_request == 1)
                                            <br>
                                            <br>
                                            <p class="btn btn-outline-secondary"> Pending</p>

                                            @endif
                                            
                                    </div>

                                </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </form>
        

        
    <!-- table to show tickets running ends-->
        <br>
        <p>different table</p>
        <!-- Main table -->    
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Item Name</th>
                    <th>Unit Price</th>
                    <th>Total Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>

            
            <!-- Fectching item  information -->
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
    </div>
   
    <!-- Grand total calculation and display  -->
    <div class="d-flex justify-content-center mt-4">
        <div class="card">
            <div class="card-body">
                GRAND TOTAL (BDT): {{ collect($detailedCartItems)->sum('total') }} TK
            </div>
        </div>
    </div>
    
    <!-- Payment button -->
    <!-- Implement Bkash gateway -->
    <div class="d-flex justify-content-center mt-4">
        <a href="https://www.bkash.com/en/business" target="_blank" class="btn btn-primary btn-lg btn-pink">
            PAYMENT
        </a>
    </div>
@endsection
