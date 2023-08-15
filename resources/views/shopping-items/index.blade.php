@extends('layouts.app')

@section('styles')
    <style>
        body {
            background-color: blue;
        }

    </style>
@endsection

@section('content')
<script src="js/modernizr-2.6.2.min.js"></script>
    <h1 class="text-center">FOOD CHART</h1>
    <h6 class="text-center">Catering booking available only till the day before departure</h6>
    <form action="{{ route('shopping-items.addToCart') }}" method="POST">    
        @csrf   
        <div class="d-flex justify-content-center">
            <table class="table table-bordered table-striped">
                <thead>
                    <!-- column headings -->
                    <tr class="text-center"> 
                        <th>ID</th>
                        <th>Ticket ID</th>
                        <th>Item Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                
                <!--column values -->  
                <tbody>
                    @foreach($shoppingItems as $item)
                        <tr>
                            <td class="text-center">{{ $item->item_id }}</td>  
                            <td class="text-center">{{ $item->ticket_id }}</td>  
                            <td class="text-center">{{ $item->name }}</td> 
                            <td class="text-center">{{ $item->price }} TK</td> 
                            
                            <!-- Quantity -->  
                            <td class="text-center">      
                                <div class="col-xxs-12 col-xs-6 mt">
                                    <div class="input-field text-center">
                                        <!--Passing quantity values for the choosen food as nested array-->
                                        <input name="item_quantity[{{ $item->item_id }}]" type="number" class="form-control rounded-0" placeholder="Enter Quantity " value="0" required min="0" max="100" step="1" pattern="\d*">
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Hidden input field to store the food ID and other datas-->
                            <input type="hidden" name="food_id[]" value="{{ $item->item_id }}">

                            <!-- to control active foods and show company details -->
                            <input type="hidden" name="ticket_id" value="{{ $item->ticket_id }}">
                            <input type="hidden" name="bus_comp_id" value="{{ $item->bus_comp_id }}">
                            <input type="hidden" name="bus_comp_name" value="{{ $item->bus_comp_name }}">

                            <!-- ADD Button -->
                            <!-- <td class="text-center"> 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm rounded-pill"><i class="icon-lock"></i>ADD</button>
                                </div>           
                            </td> -->
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>


        <!--"ADD" button at the bottom -->
        <div class="d-flex justify-content-center mt-4">
            <form action="{{ route('shopping-items.addToCart') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-lg rounded-pill"><i class="icon-lock"></i>ADD TO CART</button>
            </form>
    </div>

    </form>
@endsection
