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
    <title>Company Profile</title>
    <!-- loader-->

    <script src="js/modernizr-2.6.2.min.js"></script>
</head>

<body class="bg-theme bg-theme3">

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="clearfix"></div>
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Start Dashboard Content -->

                <!--End Dashboard Content-->
                <!-- Show company profile -->
                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">COMPANY PROFILE</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>COMPANY_ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{ $name }}</td>
                                            <td>{{ $email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End company profile -->

                <div class="row mt-3">
                    <div class="col-12 col-lg-12">
                        <button class="btn btn-outline-primary">
                            <a href="{{ route('bus_company_profile_edit') }}" style="text-decoration: none; color: inherit;">
                                <i class="fa fa-pencil"></i> Edit Profile
                            </a>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!---------------------------------->

    <!--Start overlay-->
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
    <footer class="footer bg-dark text-white text-center py-3">
        <div class="container">
            <!-- Footer content goes here -->
        </div>
    </footer>
    <!--End footer-->

</body>

</html>

<style>
    /* Body Background Styling */
    body {
        background-color: #f0e6e6;
    }

    /* Welcome Animation */
    .welcome-animation {
        animation: fadeInUp 1s ease-in-out;
        opacity: 0;
        animation-fill-mode: forwards;
    }

    @keyframes fadeInUp {
        0% {
            transform: translateY(20px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Card Styling */
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-radius: 8px 8px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    /* Button Styling */
    .btn-outline-primary {
        color: #007bff;
        border-color: #007bff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    /* Footer Styling */
    .footer {
        background-color: #292b2c;
        color: #fff;
    }
</style>

<script>
    // JavaScript to trigger the welcome animation on page load
    document.addEventListener("DOMContentLoaded", function () {
        const profileName = document.querySelector(".welcome-animation");
        profileName.style.opacity = "1";
    });
</script>

@endsection
