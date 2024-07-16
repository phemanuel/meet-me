<!DOCTYPE html>
<html lang="en">


<head>
<title>@yield('pageTitle')</title> 
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{asset('dashback/assets/img/favicon_new.png')}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashback/assets/css/vendors.css')}}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashback/assets/css/style.css')}}" />
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
								@auth
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
                                        <img src="{{ asset('storage/' . auth()->user()->user_picture) }}" alt="avtar-img">
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
								@endauth
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
                            @auth
                            <li class="active"><a href="{{ route('user-about') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">About Me</span></a> </li>
                            <li><a href="{{ route('user-role') }}" aria-expanded="false"><i class="nav-icon ti ti-info"></i><span class="nav-title">Roles</span></a> </li>
                            <li><a href="{{ route('user-skill') }}" aria-expanded="false"><i class="nav-icon ti ti-layout-grid4-alt"></i><span class="nav-title">Skills/Expertise</span></a> </li>
<li><a href="{{ route('user-service') }}" aria-expanded="false"><i class="nav-icon ti ti-layout-grid4-alt"></i><span class="nav-title">Services</span></a> </li>
                            <li><a href="{{ route('user-education') }}" aria-expanded="false"><i class="nav-icon ti ti-layout"></i><span class="nav-title">Education/Certification</span></a> </li>
                            <li><a href="{{ route('user-experience') }}" aria-expanded="false"><i class="nav-icon ti ti-pencil-alt"></i><span class="nav-title">Work Experience</span></a> </li> 
                            <li><a href="{{ route('user-portfolio') }}" aria-expanded="false"><i class="nav-icon ti ti-list"></i><span class="nav-title">Project</span></a> </li>    

<li><a href="{{ route('user-message') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Message</span><span class="nav-label label label-success">{{$unreadMessagesCount}}</span></a></li> <li class="nav-static-title">Account</li>                           
                            
                            <li><a href="{{ route('change-password') }}" aria-expanded="false"><i class="nav-icon ti ti-key"></i><span class="nav-title">Change Password</span></a>
                                                            </li>    
                            <li><a href="{{ route('logout') }}" aria-expanded="false"><i class="zmdi zmdi-power"></i><span class="nav-title">Logout</span></a>
                              @endauth                              </li>                        
                            
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
                                        <h1>Freelancers</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{ route('home') }}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="{{route('home')}}">TalentLoom Job Board</a> </li>
												<li class="breadcrumb-item active text-primary" aria-current="page">Freelancers</li>
												@auth
<li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-message')}}">Message</a></li>

                                                <li class="breadcrumb-item active text-primary" aria-current="page">About</li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-role')}}">Roles</a></li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-skill')}}">Skills</a></li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-service')}}">Services</a></li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-education')}}">Education</a></li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-experience')}}">Experience</a></li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-portfolio')}}">Project</a></li>
												@endauth
                                            </ol>
                                        </nav>
                                    </div>
                                    
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>

						<div class="mail-search border-bottom">
                                                        <div class="row align-items-center mx-0">
                                                            <div class="col-12">
                                                                <div class="form-group pt-3">
                                                                    <input type="text" class="form-control" id="search-input"  placeholder="Search..">
                                                                    <i class="fa fa-search"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                        <!--start contact contant-->
                      <!--start contact contant-->
					  <div class="row" id="freelancer-list">
						@if($allFreelancer)
                        @foreach($allFreelancer as $allFreelancers)
                            @if(auth()->check() && $allFreelancers->id === auth()->user()->id)                                
                                @continue
                            @endif
                            <div class="col-xl-4 col-sm-6">
                                <div class="card card-statistics employees-contant px-2">
                                    <div class="card-body pb-5 pt-4">
                                        <div class="text-center">
                                            <div class="text-right">
                                                <h4><span class="badge badge-primary badge-pill px-3 py-2">$0/hr</span></h4>
                                            </div>
                                            <div class="pt-1 bg-img m-auto"><img src="{{ asset('storage/' . $allFreelancers->user_picture) }}" class="img-fluid" alt="employees-img"></div>
                                            <div class="mt-3 employees-contant-inner">
                                                <h4 class="mb-1">{{$allFreelancers->full_name}}</h4>
                                                <h5 class="mb-0 text-muted">{{$allFreelancers->user_roles_major}}</h5>
                                                <div class="mt-3 ">
												@php
														$userRoles = $allFreelancers->user_roles;
														$rolesArray = explode(',', $userRoles);
														$maxDisplay = 2;
													@endphp

													@if (!empty($rolesArray))
														@foreach ($rolesArray as $index => $userRole)
															@if ($index < $maxDisplay)
																<span class="badge badge-pill badge-success-inverse px-3 py-2">
																	{{ trim($userRole) }}
																</span>
															@endif
														@endforeach
														@if (count($rolesArray) > $maxDisplay)
															<span class="badge badge-pill badge-warning-inverse px-3 py-2">
																+{{ count($rolesArray) - $maxDisplay }}
															</span>
														@endif
													@else
														<div class="alert alert-warning" role="alert">
															<span class="badge badge-pill badge-success-inverse px-3 py-2">
																N/A
															</span>                                                              
														</div>
													@endif
													<hr>
													<div class="text-center">
													<a class="btn btn-primary" href="{{ $allFreelancers->user_url }}">View Profile</a>
													<a class="btn btn-success" href="">Send Message</a>
													</div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							@endforeach	
                    @else
                        <p>Freelancers unavailable.</p>
                    @endif
                        <!--end employees contant-->
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
                        <p>&copy; Copyright 2019. All rights reserved.</p>
                    </div>
                    <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                        <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
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

<!-- Include jQuery for AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('freelancer') }}",
                type: "GET",
                data: {'query': query},
                success: function(data) {
                    $('#freelancer-list').html(data);
                },
                error: function(data) {
                    console.error('Error:', data);
                }
            });
        });
    });
</script>

</html>