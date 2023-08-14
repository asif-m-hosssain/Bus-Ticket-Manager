@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your meta tags, stylesheets, and other head content here -->
    <!-- Add animate.css library for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

                <!-- Show company profile -->
                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0 welcome-animation">BUS COMPANY PROFILE</h4>
                            </div>
                            <div class="card-body">
                                <div class="cover-photo">
                                    <a href="https://ibb.co/KyZQwm7"><img src="https://i.ibb.co/QmBqdXn/bus2.jpg" alt="Cover Photo" class="img-fluid cover-img"></a>
                                </div>
                                <table class="table table-borderless mt-4">
                                    <thead>
                                        <tr>
                                            <th>COMPANY_ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="welcome-animation">{{ $user -> id }}</td>
                                            <td class="welcome-animation">{{ $user -> name }}</td>
                                            <td class="welcome-animation">{{ $user -> email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End company profile -->

                <div class="d-flex justify-content-center mt-4">
                    <div class="row mt-3">
                        <div class="col-12 col-lg-12">
                            <button class="btn btn-outline-primary">
                                <a href="{{ route('profile_edit') }}" style="text-decoration: none; color: inherit;">
                                    <i class="fa fa-pencil"></i> Edit Profile
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

                

                <!-- Welcome message from EasyGo -->
                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Welcome to EasyGo</h4>
                                <p class="card-text">
                                    At EasyGo, we strive to provide you with the best travel experience. We welcome you to have a smooth and
                                    hassle-free journey with us. Our dedicated team is committed to offering top-notch service to our customers.
                                    Your comfort and satisfaction are our top priorities. As we embark on this journey together, we kindly
                                    request your cooperation in ensuring the best service for all passengers. Let's make every trip memorable and
                                    enjoyable!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End welcome message -->

            </div>
        </div>
    </div>

    <!-- ... (Your existing overlay, back to top button, and closing tags) ... -->

    <!-- Additional styles -->
    <style>
        /* ... (Your existing styles) ... */

        /* Animation styles */
        .welcome-animation {
            animation: fadeInUp 1s ease-in-out;
            opacity: 0;
            animation-fill-mode: forwards;
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

        /* Cover Photo Styling */
        .cover-photo {
            text-align: center;
            margin-bottom: 20px;
        }

        .cover-img {
            max-width: 100%;
            height: auto;
            max-height: 40vh; /* Adjust the value as needed */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

    </style>

    <script>
        // JavaScript to trigger the welcome animation on page load
        document.addEventListener("DOMContentLoaded", function () {
            const profileName = document.querySelectorAll(".welcome-animation");
            for (let i = 0; i < profileName.length; i++) {
                profileName[i].style.opacity = "1";
            }
        });
    </script>

</body>

@endsection
