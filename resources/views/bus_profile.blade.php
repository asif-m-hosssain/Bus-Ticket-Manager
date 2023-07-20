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

                <!-- Start Dashboard Content-->
               
                <!--End Dashboard Content-->
                <!-- show all ticket-->
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> COMPANY PROFILE </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-borderless">
                                    <thead>
                                        <tr>
                                            <th>COMPANY_ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        
                                        <tr>
                                            <td> {{ $id}} </td>
                                            <td> {{ $name}} </td>
                                            <td> {{ $email}} </td>
                                            
                                            
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <div class="col-xxs-12 col-xs-6 mt">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                            <hr>
                            
                            <button class="btn btn-outline-secondary"><i class="icon-lock"></i>>
                                <a href="{{ route('bus_company_profile_edit') }}" >Edit Profile!</a>
                            </button>
                            
                        </div>
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