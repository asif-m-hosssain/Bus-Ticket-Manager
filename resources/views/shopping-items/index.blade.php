@extends('layouts.app')

@section('styles')
    <style>
        body {
            background-color: lightblue;
        }
    </style>
@endsection

@section('content')
<script src="js/modernizr-2.6.2.min.js"></script>
    <h1 class="text-center">Shopping Items</h1>
    <form action="addToCart" method="POST">    
        @csrf   
        <div class="d-flex justify-content-center">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Add/Drop to Cart</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shoppingItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                            
                            <!-- <div class="input-field">
                                <input name="Ticket_Price" type="number" class="form-control rounded-0" placeholder="BDT" value="1000" required="" min="200" max="10000" step="1" pattern="\d*">
                                <input name="item_quantity" type="number" class="form-control rounded-0" placeholder="1000" value="1000" required="" min="200" max="10000" step="1" pattern="\d*">
                                <input name="item_quantity" type="number" class="form-control rounded-0" placeholder="1" require="" min="1" max="10" step="1" pattern="\d*">
                            </div> -->

                            
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <H6>Quantity:</H6>
                                    </label>
                                    <input name="item_quantity" type="number" class="form-control rounded-0" placeholder="Arbitrary" value="5" required="" min="1" max="100" step="1" pattern="\d*">
                                </div>
                          
                            </td>
                            <td>
                            <div class="form-group">
                                    <button onclick="saveValue(this);" name="food_id" value="{{ $item->item_id }}" type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>ADD</button>
                            </div>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            <!-- <div class="form-group">
                    <button type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Submit-Ticket</button>
            </div> -->
        </div>
    </form>
@endsection
