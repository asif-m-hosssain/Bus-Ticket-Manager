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
    <title>Change Pass</title>
    <!-- loader-->

    <script src="js/modernizr-2.6.2.min.js"></script>
</head>

<body class="bg-dark text-white">

    <!-- Start wrapper-->
    <div id="wrapper">
        <!--  -->

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

                <!--pass change starts -->
                <div class="row mt-4">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <form action="pass_update" method="POST">
                                    @csrf
                                    

                                    <div class="form-group mb-3">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Current_Password') }}</label>

                                        <div class="col-md-12">
                                            <input id="current_password" type="password" class="form-control @error('password') is-invalid @enderror" name="current_password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <!-- new -->
                                    

                                    <div class="form-group mb-3">
                                        <label for="new_password" class="col-md-4 col-form-label">{{ __('New Password (at least 8 characters)') }}</label>

                                        <div class="col-md-12">
                                            <input id="new_password" type="password" minlength="8" class="form-control " name="new_password" required autocomplete="new-password">

                                            
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password_confirmation" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-12">
                                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                            @error('password_confirmation') 
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-muted">Please make sure the password matches the one above.</small>
                                        </div>
                                    </div>

                                                                
                                    
                                    <button type="submit" class="btn btn-outline-dark btn-block">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--pass change ends -->
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
    <footer class="footer bg-primary text-white text-center py-3">
        <div class="container">
            <!-- Footer content goes here -->
            <p>© 2023 Bus Company. All rights reserved.</p>
        </div>
    </footer>
    <!--End footer-->

</body>

</html>

<style>
    /* Body Background Styling */
    body {
        background-color: #222;
        font-family: 'Arial', sans-serif;
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
    .btn-outline-light {
        color: #fff;
        border-color: #fff;
    }

    .btn-outline-light:hover {
        background-color: #fff;
        color: #007bff;
    }

    /* Footer Styling */
    .footer {
        background-color: #007bff;
        color: #fff;
    }
</style>

@endsection
