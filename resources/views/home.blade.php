@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your meta tags, stylesheets, and other head content here -->
    <!-- Add animate.css library for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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

                <!-- Welcome card with animation -->
                <div class="card">
                    <!-- ... (Your existing card content) ... -->
                </div>

                <!-- Search and results section -->
                <div class="container">
                    <!-- ... (Your existing search section) ... -->
                </div>

                <!-- Informational content in a single row -->
                <div class="row mt-5 align-items-center text-center">
                    <div class="col-md-12">
                        <h3 class="text-primary animate__animated animate__fadeInUp animate__delay-1s">
                            Discover the Benefits of Our Bus Management Service
                        </h3>
                    </div>
                    <div class="col-md-3">
                        <img src="https://i.ibb.co/4Rmy4G0/bus1.jpg" alt="Bus Image" class="img-fluid animate__animated animate__fadeInUp animate__delay-2s">
                        <h4 class="text-primary mt-3">Why Choose Us?</h4>
                        <p class="text-secondary">
                            Welcome to our Bus Ticket Management service, where your travel experience becomes a breeze.
                            With our user-friendly platform, we provide you with an array of features to ensure your journey
                            is seamless and comfortable.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <img src="https://i.ibb.co/0ZKv1K5/road.jpg" alt="Routes Image" class="img-fluid animate__animated animate__fadeInUp animate__delay-3s">
                        <h4 class="text-primary mt-3">Explore Routes</h4>
                        <p class="text-secondary">
                            Embark on a journey with endless possibilities. Our extensive network of routes covers numerous
                            destinations, catering to your travel needs. Find the perfect route for your next adventure.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <img src="https://i.ibb.co/vLgmZ3h/seat.jpg" alt="Seat Image" class="img-fluid animate__animated animate__fadeInUp animate__delay-4s">
                        <h4 class="text-primary mt-3">Customize Seats</h4>
                        <p class="text-secondary">
                            Your comfort is our priority. With our user-friendly interface, customize your seat selection
                            before booking. Choose window or aisle seats, and travel in utmost comfort.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <img src="https://i.ibb.co/bBkmtNz/bkash-2.jpg" alt="Payment Image" class="img-fluid animate__animated animate__fadeInUp animate__delay-5s">
                        <h4 class="text-primary mt-3">Secure Payments</h4>
                        <p class="text-secondary">
                            Your transactions are safe and secure. Our platform ensures your payment information is
                            protected, allowing you to book with confidence and convenience.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ... (Your existing overlay, back to top button, and closing tags) ... -->

    <!-- Additional styles -->
    <style>
        /* ... (Your existing styles) ... */

        /* Animation styles */
        .animate__animated {
            animation-duration: 1s;
        }

        .animate__fadeInUp {
            animation-name: fadeInUp;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 50%, 0);
            }
            to {
                opacity: 1;
                transform: none;
            }
        }
    </style>

</body>

@endsection
