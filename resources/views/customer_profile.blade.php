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
    <title>Welcome, {{ Auth::user()->name }} - Bus Ticket Management</title>
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
                        <i>{{ Auth::user()->name }}</i>
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
                            <div class="card-header bg-primary text-white">
                                <h4>CUSTOMER PROFILE</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-borderless">
                                    <thead>
                                        <tr>
                                            <th>CUSTOMER ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $user ->id }}</td>
                                            <td>{{ $user ->name }}</td>
                                            <td>{{ $user ->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <a href="{{ route('bus_company_profile_edit') }}" class="btn btn-outline-secondary">
                    <i class="icon-lock"></i> Edit Profile!
                </a>

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

    <style>
        /* Global styles */
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        /* Card styles */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
        }

        .card-header {
            background-color: #4caf50;
            border-radius: 1rem 1rem 0 0;
            padding: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
            color: #fff;
            position: relative; /* Add this line for animation */
        }

        .card-header:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #4caf50, #3e8e41); /* Gradient animation */
            opacity: 0;
            z-index: -1;
            border-radius: 1rem 1rem 0 0;
            animation: slideIn 1s forwards;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
            }
        }

        .card-body {
            padding: 2rem;
        }

        /* Table styles */
        .table {
            font-size: 0.9rem;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        /* Button styles */
        .btn-outline-secondary {
            border-color: #4caf50;
            color: #4caf50;
            border-radius: 0.25rem;
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s;
        }

        .btn-outline-secondary:hover {
            background-color: #4caf50;
            color: #fff;
        }
    </style>
</body>

</html>

@endsection
