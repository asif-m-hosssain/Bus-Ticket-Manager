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

                <!--Start Dashboard Content-->
               
                <!--End Dashboard Content-->
                <!--show all ticket-->
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Available Tickets </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-borderless">
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

                                        @foreach($brandSpecifiedTicket as $item)
                                        <tr>
                                            <td> {{ $item->id}} </td>
                                            <td> {{ $item->b_comp_ticket_from}} </td>
                                            <td> {{ $item->b_comp_ticket_to}} </td>
                                            <td> {{ $item->b_comp_ticket_date}} </td>
                                            <td> {{ $item->b_comp_ticket_seat}} </td>
                                            <td> {{ $item->b_comp_ticket_price}} </td>
                                            <td> {{ $item->created_at   }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--show all ticket ends==-->
                <br>
                <!--show all expired ticket-->
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Expired Tickets</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-borderless">
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

                                        @foreach($brandSpecifiedExpiredTicketDate as $item)
                                        <td> {{ $item->id}} </td>
                                        <td> {{ $item->b_comp_ticket_from}} </td>
                                        <td> {{ $item->b_comp_ticket_to}} </td>
                                        <td> {{ $item->b_comp_ticket_date}} </td>
                                        <td> {{ $item->b_comp_ticket_seat}} </td>
                                        <td> {{ $item->b_comp_ticket_price}} </td>
                                        <td> {{ $item->created_at   }} </td>
                                        </tr>
                                        @endforeach
                                        @foreach($brandSpecifiedExpiredTicketSeat as $item)
                                        <td> {{ $item->id}} </td>
                                        <td> {{ $item->b_comp_ticket_from}} </td>
                                        <td> {{ $item->b_comp_ticket_to}} </td>
                                        <td> {{ $item->b_comp_ticket_date}} </td>
                                        <td> {{ $item->b_comp_ticket_seat}} </td>
                                        <td> {{ $item->b_comp_ticket_price}} </td>
                                        <td> {{ $item->created_at   }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--show all expired ticket ends==-->
                <br>
                <!-- start ticket form--->
                <form action="BrandAddTicketSubmit" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <H4>Register New Ticket</H4>
                            </div>
                            <hr>
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="from">
                                        <H6>From:</H6>
                                    </label>
                                    <!-- <input type="text" class="form-control" id="from-place" placeholder="Dhaka, Bangladesh"/> -->
                                    <select required class="form-control form-control-rounded" name="Start_RouteName" id="input-6" placeholder="select">>
                                        @foreach($allRoutes as $item)
                                        <option onkeyup="saveValue(this);" value="{{ $item->route_name }}"> {{ $item->route_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="from">
                                        <H6>To:</H6>
                                    </label>
                                    <select required class="form-control form-control-rounded" name="Destination_RouteName" id="input-6" placeholder="select">>
                                        @foreach($allRoutes as $item)
                                        <option onkeyup="saveValue(this);" value="{{ $item->route_name }}"> {{ $item->route_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <H6>Seats:</H6>
                                    </label>
                                    <input name="No_Seats" type="number" class="form-control rounded-0" placeholder="Seats" required="" min="0" max="41" step="1" pattern="\d*">
                                </div>
                            </div>
                            <hr>
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <H6>Time:</H6>
                                    </label>
                                    <input class="form-control rounded-0" type="datetime-local" id="starttime" name="Start_Time" onfocus="(this.type='datetime-local')" onblur="(this.type='datetime-local')">
                                </div>
                            </div>
                            <hr>
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <H6>Price(BDT):</H6>
                                    </label>
                                    <input name="Ticket_Price" type="number" class="form-control rounded-0" placeholder="BDT" value="1000" required="" min="200" max="10000" step="1" pattern="\d*">
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
                <!--delete ticket-->
                <form action="BrandDeleteTicketSubmit" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <H4>Remove Ticket</H4>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label for="input-6">Remove</label>
                                <select required class="form-control form-control-rounded" name="ticket_delete" id="input-6" placeholder="select">>
                                    @foreach($brandSpecifiedTicket as $item)
                                    <option onkeyup="saveValue(this);" value="{{ $item->id }}"> Ticket-ID: {{ $item->id}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i> Remove</button>
                            </div>

                        </div>
                    </div>
                </form>
                <!--end ticket form -->

                <button class="btn btn-outline-secondary"><i class="icon-lock"></i>>
                                <a href="{{ route('edit_ticket') }}">Edit Ticket!</a>
                </button>
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