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
                <form action="submit_rating" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <!-- !!!! -->
                            <div class="card-title">
                                <H4>Register New Review</H4>
                            </div>
                            <hr>
                            
                            
                            <input type="hidden" name="company_id_to_show_rating" value={{$company_id_to_show_rating}}>
                            <div class="col-xxs-12 col-xs-6 mt">
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
                            </div>



                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Submit</button>
                            </div>
                            <!-- !!!! -->

                        </div>
                    </div>
                </form>

                <br>




                <form action="select_rating_from_html" method="POST">
                    @csrf





                    <div class="d-flex justify-content-center">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>rating_id </th>
                                    <th>bus_comp_id </th>
                                    <th>company_name </th>
                                    <th>customer_id </th>
                                    <th>customer_name </th>
                                    <th>review </th>
                                    <th>rating </th>
                                    <th>created_date </th>
                                    <th>updated_date </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($company_rating as $item)
                                    <tr>
                                        <td>{{ $item->rating_id }}</td>
                                        <td>{{ $item->bus_comp_id }}</td>
                                        <td>{{ $item->company_name }}</td>
                                        <td>{{ $item->customer_id }}</td>
                                        <td>{{ $item->customer_name }}</td>
                                        <td>{{ $item->review }}</td>
                                        <td>{{ $item->rating }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                       
                                        
                                        <!-- <td>
                                        <div class="form-group">
                                                <button onclick="saveValue(this);" name="comp_id" value="{{ $item->id }}" type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Ratings</button>
                                        </div>
                                            
                                        </td> -->
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