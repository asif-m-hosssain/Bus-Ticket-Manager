@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags and other head elements -->
</head>

<body class="bg-theme bg-theme3">
    <div id="wrapper">
        <!-- Sidebar and content wrapper -->

        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Customer Profile Section -->
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
                                            <td>{{ $user -> id }}</td>
                                            <td>{{ $user -> name }}</td>
                                            <td>{{ $user -> email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                
                <div class="d-flex justify-content-center mt-4">
                    <a href="{{ route('profile_edit') }}" class="btn btn-outline-secondary">
                        <i class="icon-lock"></i> Edit Profile!
                    </a>
                </div>
                <br>
                

                <!-- Services Description Section -->
                <div class="services-description">
                    <h2 class="text-center">Explore EasyGo Services</h2>
                    <p class="text-center">We're here to provide you with convenient and comfortable travel experiences.</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="service-card">
                                <div class="service-icon">
                                    <a href="https://imgbb.com/"><img src="https://i.ibb.co/gDxvWkQ/ticket.jpg" alt="Bus Ticket Booking"></a>
                                </div>
                                <h5>Bus Ticket Booking</h5>
                                <p>Book your bus tickets hassle-free and enjoy your journey.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-card">
                            <style>
                                .service-icon img {
                                    width: 45%; /* Adjust the percentage to resize the image */
                                    height: auto; /* Maintain aspect ratio */
                                }
                            </style>

                            <div class="service-icon">
                                <a href="https://ibb.co/nfDbxt0"><img src="https://i.ibb.co/ZKhVq7J/map.jpg" alt="Routes"></a>
                            </div>
                                                            <h5>Routes</h5>
                                <p>Explore our wide range of routes to travel to your desired destinations.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service-card">
                                <div class="service-icon">
                                    <a href="https://imgbb.com/"><img src="https://i.ibb.co/S016qY5/custom.jpg" alt="Easy Customization"></a>
                                </div>
                                <h5>Easy Customization</h5>
                                <p>Customize your travel preferences and make your journey uniquely yours.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <!-- Additional styles and scripts -->
</body>

</html>
@endsection
