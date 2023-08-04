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
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
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

        <div class="clearfix"></div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- search bar -->
                
                <!-- search bar ends -->
                
                <!--show all ticket ends==-->
                <br>
                <form action="BuyingTheSelectedTicket" method="POST">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                
                                    <th>Ticket-ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Departure</th>
                                    <th>Available Seats</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $item)
                                    <tr>
                                        <td> {{ $item->id}} </td>
                                        <td> {{ $item->b_comp_ticket_from}} </td>
                                        <td> {{ $item->b_comp_ticket_to}} </td>
                                        <td> {{ $item->b_comp_ticket_date}} </td>
                                        <td> {{ $item->b_comp_ticket_seat}} </td>
                                        <td> {{ $item->b_comp_ticket_price}} </td>
                                        <td> {{ $item->created_at   }} </td>
                                        
                                        <td>
                                        <div class="form-group">
                                                <button onclick="saveValue(this);" name="ticket_id" value="{{ $item->id }}" type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Buy</button>
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

                <!--end ticket form -->
            </div>
        </div>
    </div>
    <!---------------------------------->

    <!--start overlay-->
    <div class="overlay toggle-menu"></div>
    <!--end overlay-->
    </div>
    <!-- End container-fluid-->
    </div>
    <!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <!-- <footer class="footer">
        <div class="container">
        </div>
    </footer> -->
    <!--End footer-->

    

    </div>
    <!--End wrapper-->

    

</body>

</html>

@endsection