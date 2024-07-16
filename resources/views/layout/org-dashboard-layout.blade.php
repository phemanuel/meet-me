<!DOCTYPE html>
<html lang="en">


<head>
<title>@yield('pageTitle')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Portfolio template that can be used to build personalized portfolio for individuals." />
    <meta name="author" content="Kings Branding Consult" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{asset('dashback/assets/img/favicon_new.png')}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashback/assets/css/vendors.css')}}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashback/assets/css/style.css')}}" />
    <style>
        ul {
    list-style: none;
    display: flex; /* Use flexbox to create a horizontal layout */
}

li {
    margin-right: 10px; /* Add spacing between list items (optional) */
}
    </style>
    <style>
    /* Success Alert */
    .alert.alert-success {
        background-color: #28a745; /* Green background color */
        color: #fff; /* White text color */
        padding: 10px; /* Padding around the text */
        border-radius: 5px; /* Rounded corners */
    }

    /* Error Alert */
    .alert.alert-error {
        background-color: #dc3545; /* Red background color */
        color: #fff; /* White text color */
        padding: 10px; /* Padding around the text */
        border-radius: 5px; /* Rounded corners */
    }
.style1 {color: #000000}
    .style2 {
	color: #330066;
	font-size: 15px;
}
.style5 {font-family: Calibri; font-weight: bold; font-size: 12px; }
    </style>
</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            
            <!-- begin app-header -->
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">

                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{asset('dashback/assets/img/loom_logo.png')}}" class="img-fluid logo-desktop" alt="logo" />
                            <img src="{{asset('dashback/assets/img/loom_logo.png')}}" class="img-fluid logo-mobile" alt="logo" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->
                    <!-- begin navigation -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navigation d-flex">
                            <ul class="navbar-nav nav-left">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                                        <i class="ti ti-align-right"></i>
                                    </a>
                                </li>
                                <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                                    <a href="javascript:void(0)" class="nav-link expand">
                                        <i class="icon-size-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav nav-right ml-auto"> 
                            <li class="nav-item dropdown">
                                @if($unreadMessagesCount == 0)
                                    <a class="nav-link dropdown-toggle" href="{{route('user-message')}}" id="navbarDropdown3" role="button"  aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-bell"></i>
                                        <!-- <span class="notify">
                                                    <span class="blink"></span>
                                        <span class="dot"></span> -->
                                        </span>
                                    </a>  
                                    @elseif($unreadMessagesCount > 0)  
                                    <a class="nav-link dropdown-toggle" href="{{route('user-message')}}" id="navbarDropdown3" role="button"  aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-bell"></i>
                                        <span class="notify">
                                                    <span class="blink"></span>
                                        <span class="dot"></span>
                                        </span>
                                    </a>
                                    @endif
                                </li>
                                <li class="nav-item dropdown user-profile">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('storage/app/public/' . auth()->user()->user_picture) }}" alt="avtar-img">
                                        <span class="bg-success user-status"></span>
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <div class="bg-gradient px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mr-1">
                                                    <h4 class="text-white mb-0">{{auth()->user()->full_name}}</h4>
                                                    <small class="text-white">{{auth()->user()->email}}</small>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <a class="dropdown-item d-flex nav-link" href="{{ route('logout') }}">
                                                <i class="zmdi zmdi-power"></i> Logout</a>                                           
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->
            </header>
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Dashboard</li>
                            
                            <li><a href="{{ route('home') }}" aria-expanded="false"><i class="nav-icon ti ti-list"></i><span class="nav-title">TalentLoom Job Board</span></a> </li>
                            
                            <li class="active"><a href="{{ route('user-about-organization') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">About Me</span></a> </li>
                            <li><a href="{{ route('user-role-organization') }}" aria-expanded="false"><i class="nav-icon ti ti-info"></i><span class="nav-title">Industry Sector</span></a> </li>
                            <li><a href="{{ route('post-job') }}" aria-expanded="false"><i class="nav-icon ti ti-layout-grid4-alt"></i><span class="nav-title">Post Jobs</span></a> </li>
                            
<li><a href="{{ route('post-upskill') }}" aria-expanded="false"><i class="nav-icon ti ti-layout-grid4-alt"></i><span class="nav-title">Post Upskill</span></a> </li>
                            <li><a href="{{ route('give-review') }}" aria-expanded="false"><i class="nav-icon ti ti-layout"></i><span class="nav-title">Review</span></a> </li>
                            
<li><a href="{{ route('payment-setup') }}" aria-expanded="false"><i class="nav-icon ti ti-pencil-alt"></i><span class="nav-title">Payment Setup</span></a> </li> 
<li><a href="{{ route('user-message') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Message</span><span class="nav-label label label-success">{{$unreadMessagesCount}}</span></a></li>

<li class="nav-static-title">Account</li>                           
                            
                            <li><a href="{{ route('change-password') }}" aria-expanded="false"><i class="nav-icon ti ti-key"></i><span class="nav-title">Change Password</span></a>
                                                            </li>    
                            <li><a href="{{ route('logout') }}" aria-expanded="false"><i class="zmdi zmdi-power"></i><span class="nav-title">Logout</span></a>
                                                            </li>                        
                            
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>About</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item"> TalentLoom</li>
<li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-message')}}">Message</a></li>

                                                <li class="breadcrumb-item active text-primary" aria-current="page">About</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-role-organization')}}">Industry Sector</a></li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('post-job')}}">Post Jobs</a></li>

                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('post-upskill')}}">Post Upskill</a></li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('give-review')}}">Review</a></li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('payment-setup')}}">Payment Setup</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                    
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- Notification -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                                    <strong>Welcome {{auth()->user()->full_name}} !</strong> You should check all sections to keep your profile up to date.
                                    
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ti ti-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <!--mail-Compose-contant-start-->
                        <div class="row account-contant">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                                                <div class="page-account-profil pt-5">
                                                    <div class="profile-img text-center rounded-circle">
                                                        <div class="pt-5">
                                                            <div class="bg-img m-auto">
                                                                <img src="{{ asset('storage/app/public/' . auth()->user()->user_picture) }}" class="img-fluid" alt="users-avatar">
                                                            </div>
                                                            <div class="profile pt-4">
                                                                <h4 class="mb-1">{{ auth()->user()->full_name }}</h4>
                                                                <p class="style1">{{ auth()->user()->email }}</p>
                                                                <hr>
                                                               <strong><p class="style2">
                                                                @php
                                                                $userRoles = auth()->user()->user_roles;
                                                                $rolesArray = explode(',', $userRoles);
                                                                @endphp

                                                                @if (!empty($rolesArray))
                                                                @foreach ($rolesArray as $userRole)
                                                                <i class="dashicons dashicons-yes-alt">
                                                                    </i>{{ trim($userRole) }}                                                                   
                                                                @endforeach
                                                            @else
                                                            <div class="alert alert-warning" role="alert">
                                                                    No roles found                                                                
                                                                </div>
                                                            @endif

                                                         </p></strong>                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="profile-btn text-center">
                                                    <table class="table" align="center">
                                                        <tr>
                                                            <td><div><a href="{{route('user-page')}}" class="btn btn-primary" target="_blank">View Profile</a></div></td>
                                                            <td><div><a href="{{route('profile-picture')}}" class="btn btn-light text-primary mb-2">Update Picture</a></div></td>
                                                        </tr>
                                                    </table>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                                                <div class="page-account-form">
                                                    <div class="form-titel border-bottom p-3">
                                                    @if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                    @elseif(session('error'))
                                                    <div class="alert alert-danger">
                                                        {{ session('error') }}
                                                    </div>
                                                    @endif   
                                                    @if ($errors->has('user_about'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('user_about') }}
                                                    </div>
                                                    @endif                                                  
                                                        <h5 class="mb-0 py-2">Edit Your Personal Settings</h5>
                                                    </div>
                                                    <div class="p-4">
                                                        <form name="asic-form" action="{{ route('profile-update', ['id' => auth()->user()->id]) }}" method="POST">
                                                        @csrf
														@method('PUT')
                                                        <div class="form-row">                                                         
                                                                <div class="form-group col-md-12">
                                                                    <label for="name1"><span class="style1">Organization Name</span></label>
                                                                    <input type="text" class="form-control" name="full_name" value="{{auth()->user()->full_name}}" style="color: black;">
                                                                </div>  
                                                                <table>
                                                                    <tr>
                                                                        <td colspan="2"><label for="phone1"><span class="style1">Phone Number</span></label></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign="top">
                                                                            <select name="country_code" class="form-control" style="color: black;">
                                                                                @if(auth()->user()->country_code)
                                                                            <option value="" selected>{{auth()->user()->country_code}}</option>
                                                                            @foreach ($countries as $country)
                                                                                <option value="{{ $country->dialing_code }}">{{ $country->country_code }}({{$country->dialing_code}})</option>
                                                                            @endforeach
                                                                            @else
                                                                            <option value="">Select Country Code</option>
                                                                            @foreach ($countries as $country)
                                                                                <option value="{{ $country->dialing_code }}">{{ $country->country_code }}({{$country->dialing_code}})</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select></td>
                                                                        <td valign="top"><div class="form-group col-md-12">                                                                                                                                        
                                                                          <input type="text" class="form-control" name="user_phone" value="{{auth()->user()->user_phone}}" style="color: black;">
                                                                </div></td>
                                                                    </tr>
                                                                </table>                                                              
                                                                  <div class="form-group col-md-12">                                                                    
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="email1"><span class="style1">Email</span></label>
                                                                   <p class="style1">{{auth()->user()->email}}</p>
                                                                </div>
                                                          </div>
                                                            <div class="form-group">
                                                                <label for="add1"><span class="style1">Username</span></label>
                                                                <input type="text" class="form-control" name="user_name" value="{{auth()->user()->user_name}}" style="color: black;">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="add2"><span class="style1">User Url</span></label>
                                                                <p class="style1"> {{auth()->user()->user_url}} </p>
                                                            </div>  
                                                            <hr>
                                                            <div class="form-group">
                                                                <label for="add1"><span class="style1">About yourself(200 words)</span></label>
                                                                <textarea id="editor1" name="user_about" rows="10" cols="50"  required>{{auth()->user()->user_about}}</textarea>
                                                            </div>   
                                                            <input type="hidden" value="n/a" name="user_category">                                                                                           
                                                            <button type="submit" class="btn btn-primary">Update Information</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 border-t col-12">
                                                <div class="page-account-form">
                                                    <div class="form-titel border-bottom p-3">
                                                    @if(session('success-new'))
                                                    <div class="alert alert-success">
                                                        {{ session('success-new') }}
                                                    </div>
                                                    @elseif(session('error-new'))
                                                    <div class="alert alert-danger">
                                                        {{ session('error-new') }}
                                                    </div>
                                                    @endif
                                                        <h5 class="mb-0 py-2">Social Media Links</h5>
                                                    </div>
                                                    <div class="p-4">
                                                        <form name="social-form" action="{{ route('profile-update-social', ['id' => auth()->user()->id]) }}" method="POST">
                                                        @csrf
														@method('PUT')
                                                            <div class="form-group">
                                                                <label for="fb"><span class="style1">Facebook URL:</span></label>
                                                                <input type="text" class="form-control" name="user_facebook" value="{{auth()->user()->user_facebook}}" style="color: black;">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tr"><span class="style1">Twitter URL:</span></label>
                                                              <input type="text" class="form-control" name="user_twitter" value="{{auth()->user()->user_twitter}}" style="color: black;">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="br"><span class="style1">Instagram URL:</span></label>
                                                              <input type="text" class="form-control" name="user_instagram" value="{{auth()->user()->user_instagram}}" style="color: black;">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="li"><span class="style1">LinkedIn URL:</span></label>
                                                                <input type="text" class="form-control" name="user_linkedin" value="{{auth()->user()->user_linkedin}}" style="color: black;">
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Update Socials</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--mail-Compose-contant-end-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <!-- begin footer -->
            <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                    <p>&copy; Copyright 2022-<?php echo date("Y"); ?>. All rights reserved.</p>
                    </div>
                    <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                        <p><a target="_blank" href="https://www.kingsconsult.com.ng">Kings Branding Consult</a></p>
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    <script src="{{asset('dashback/assets/js/vendors.js')}}"></script>

    <!-- custom app -->
    <script src="{{asset('dashback/assets/js/app.js')}}"></script>
    <script src="{{asset('dashback/assets/ckeditor/ckeditor.js')}}"></script>
</body>


</html>
<script>
$(function(){
	/** add active class and stay opened when selected */
	var url = window.location;
  
	// for sidebar menu entirely but not cover treeview
	$('ul.sidebar-menu a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.treeview-menu a').filter(function() {
	    return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //CK Editor
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
  });
</script>