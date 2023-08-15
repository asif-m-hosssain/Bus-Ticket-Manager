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
    <title>Seat Status</title>
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

                
                <!--show all ticket ends==-->
                <br>
                <form action="submit_seat" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <!-- !!!! -->
                            <div class="card-title">
                                <H4>Bus seat</H4>
                            </div>
                            <hr>
                            
                            


                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Coloumn A</th>
                                        <th>Coloumn B</th>
                                        <th>Coloumn C</th>
                                        <th>Coloumn D</th>
                                    </tr>
                                </thead>
                        
                            
                                <!-- Fectching item  information -->
                                <tbody>

                                    @for ($i = 1; $i < count($empty_seat); $i=$i+4)

                                        <tr>

                                            <td class="text-center">
                                                @if ($empty_seat[$i] == False)
                                                    <input type="checkbox" name="seat[]" value="{{ $i }}"> {{ $i }}<br>
                                                @else
                                                    <p>{{ $i }}</p>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($empty_seat[$i+1] == False)
                                                    <input type="checkbox" name="seat[]" value="{{ $i+1 }}"> {{ $i+1 }}<br>
                                                @else
                                                    <p>{{ $i+1 }}</p>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($empty_seat[$i+2] == False)
                                                    <input type="checkbox" name="seat[]" value="{{ $i+2 }}"> {{ $i+2 }}<br>
                                                @else
                                                    <p>{{ $i+2 }}</p>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($empty_seat[$i+3] == False)
                                                    <input type="checkbox" name="seat[]" value="{{ $i+3 }}"> {{ $i+3 }}<br>
                                                @else
                                                    <p>{{ $i+3 }}</p>
                                                @endif
                                            </td>

                                           
                                            
                                        </tr>
                                        
                                    @endfor

                                    
                                </tbody>

                            </table>

                            
                            
                            <input type="hidden" name="TicketID" value={{$TicketID}}>
                            <input type="hidden" name="tickets" value={{$Ticket}}>
                            <input type="hidden" name="b_comp_ticket_author_id" value={{$b_comp_ticket_author_id}}>
                            <input type="hidden" name="b_comp_ticket_author_name" value={{$b_comp_ticket_author_name}}>
                            <input type="hidden" name="empty_seat" value={{$Empty_seat}}>
                            



                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Submit</button>
                            </div>
                            <!-- !!!! -->

                        </div>
                    </div>
                </form>

                <br>




                <!--  -->

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

    

    

    </div>
    <!--End wrapper-->

    

</body>

</html>

@endsection