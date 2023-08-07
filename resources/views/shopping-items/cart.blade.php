@extends('layouts.app')

@section('content')
    <h1 class="text-center">CHECKOUT</h1>
    <h4 class="text-center">Thank you for using EasyGO</h4>
    <div class="d-flex justify-content-center">
    
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
