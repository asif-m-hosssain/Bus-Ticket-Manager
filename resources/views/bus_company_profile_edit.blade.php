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

                
               
                
                <!--Bus_company_profile_edit      starts     -->
                <br>
                <form action="profile_update" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <H4>Edit Profile</H4>
                            </div>

                            <hr>
                            
                            
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <H6>Name:</H6>
                                    </label>
                                    <input name="name" type="text" class="form-control rounded-0" placeholder="<?php echo $name; ?>"  value= "<?php echo $name; ?>">
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <H6>Email:</H6>
                                    </label>
                                    <input name="email" type="text" class="form-control rounded-0" placeholder="<?php echo $email; ?>" value= "<?php echo $email; ?>">
                                </div>
                            </div>
 
                            <hr>

                            <!-- Role by typing starts -->
                            <!-- <div class="col-xxs-12 col-xs-6 mt">
                                <div class="input-field">
                                    <label for="quantity">
                                        <H6>Role:</H6>
                                    </label>
                                    <input name="role" type="text" class="form-control rounded-0" placeholder="<?php echo $role; ?>" value= "<?php echo $role; ?>">
                                </div>
                            </div>
                            <hr> -->
                            <!-- Role by typing ends -->



                            <!-- Role by selecting starts -->
                            <div class="form-group">
                                <label for="input-6">Role</label>
                                <select required class="form-control form-control-rounded" name="role" id="input-6" placeholder="select">>
                                    @foreach($all_roles as $item)
                                    <option onkeyup="saveValue(this);" value="{{ $item}}">{{ $item}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <!-- Role by selecting ends -->
                            
 
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-secondary"><i class="icon-lock"></i>Update</button>
                            </div>


                        </div>
                    </div>
                </form>

                <!--Bus_company_profile_edit      ends -->
            </div>
        </div>
    </div>
    <!---------------------------------->


    

    

</body>

</html>

@endsection