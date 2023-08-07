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
    <title>Edit Profile - Bus Company</title>
    <!-- loader-->

    <script src="js/modernizr-2.6.2.min.js"></script>
</head>

<body class="bg-dark text-white">

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

                <!--Bus_company_profile_edit starts -->
                <div class="row mt-4">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <form action="profile_update" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" class="form-control rounded-0 bg-dark text-white"
                                            value="{{ $name }}" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control rounded-0 bg-dark text-white"
                                            value="{{ $email }}" required>
                                    </div>
                                    <!-- <div class="form-group mb-4">
                                        <label for="role">Role</label>
                                        <select required class="form-control form-control-rounded bg-dark text-white"
                                            name="role" id="role">
                                            @foreach($all_roles as $item)
                                            <option value="{{ $item }}" @if($role === $item) selected @endif>
                                                {{ ucfirst($item) }}</option>
                                            @endforeach
                                        </select>
                                    </div> -->
                                    <button type="submit" class="btn btn-outline-dark btn-block">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Bus_company_profile_edit ends -->
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
