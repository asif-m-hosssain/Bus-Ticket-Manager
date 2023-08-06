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
                            
                            <p>total number of seats {{$Empty_seat}}</p>
                            @for ($i = 1; $i < count($empty_seat); $i++)
                                @if ($empty_seat[$i] == False)
                                    <input type="checkbox" name="seat[]" value="{{ $i }}"> {{ $i }}<br>
                                @else
                                    <p>{{ $i }}</p>
                                @endif
                            @endfor

                            
                            
                            <input type="hidden" name="TicketID" value={{$TicketID}}>
                            <input type="hidden" name="tickets" value={{$Ticket}}>
                            <input type="hidden" name="b_comp_ticket_author_id" value={{$b_comp_ticket_author_id}}>
                            <input type="hidden" name="b_comp_ticket_author_name" value={{$b_comp_ticket_author_name}}>
                            <input type="hidden" name="empty_seat" value={{$Empty_seat}}>
                            <!-- @for($i = 1; $i <= $Empty_seat ; $i++) 
                                <input type="checkbox" name="seat[]" value={{$i}}> {{$i}}<br>
                            
                            @endfor -->

                            <!-- <input type="checkbox" name="seat[]" value=1> 1<br>
                            <input type="checkbox" name="seat[]" value=2> 2 <br>
                            <input type="checkbox" name="seat[]" value=3> 3 <br>
                            <input type="checkbox" name="seat[]" value=4> 4 <br>
                            <input type="checkbox" name="seat[]" value=5> 5 <br>
                            <input type="checkbox" name="seat[]" value=6> 6 <br>
                            <input type="checkbox" name="seat[]" value=7> 7 <br>
                            <input type="checkbox" name="seat[]" value=8> 8 <br>
                            <input type="checkbox" name="seat[]" value=9> 9 <br>
                            <input type="checkbox" name="seat[]" value=10> 10 <br>
                            <input type="checkbox" name="seat[]" value=11> 11<br>
                            <input type="checkbox" name="seat[]" value=12> 12 <br> -->
                            
                            
                            
                            <!-- <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <h6>Review:</h6>
                                    </label>
                                    <input name="review" type="text" class="form-control rounded-0" required="" >
                                </div>
                            </div>
                            
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <h6>Rating (1 to 5):</h6>
                                    </label>
                                    <input name="rating" type="number" class="form-control rounded-0" required="" min="1" max="5" step="1">
                                </div>
                            </div> -->



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