@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>AddShoppingItemController</title>
    <!-- loader-->
   
    <script src="js/modernizr-2.6.2.min.js"></script>
</head>

<body class="bg-theme bg-theme3">

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">

                <h3>
                    <a style="color:#FFFAF0">
                        <i>{{Auth::user()->name}}</i>
                    </a>
                </h3>
            </div>
            
        </div>
        <!--End sidebar-wrapper-->

        <div class="clearfix">

        </div>
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Start Dashboard Content-->
               
                
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> Menu </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        
                                        @foreach($allshoppingitems as $item)
                                            <tr>
                                                <td> {{ $item->item_id}} </td>
                                                <td> {{ $item->name}} </td>
                                                <td> {{ $item->price}} </td>
                                                
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                <div class="col-xxs-12 col-xs-6 mt">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <!--end Dashboard Content -->

                <form action="addToMenu" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <H4>New item</H4>
                            </div>
                            <hr>
                            
                            <hr>
                            
                            <hr>
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="text">
                                        <H6>Name:</H6>
                                    </label>
                                    <input name="item_name" type="text" class="form-control rounded-0" placeholder="Name of item" required="" >
                                </div>
                            </div>
                            <hr>
                            
                            <hr>
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">

                                    <label for="quantity">
                                        <H6>Price(BDT):</H6>
                                    </label>
                                    <input name="item_Price" type="number" class="form-control rounded-0" placeholder="BDT" value="10" required="" min="1" max="10000" step="1" pattern="\d*">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Submit-Ticket</button>
                            </div>
                        </div>
                    </div>
                </form>

                <br>


            </div>
        </div>
    </div>
    <!---------------------------------->

    

    

</body>

</html>

@endsection