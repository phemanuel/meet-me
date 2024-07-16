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
    .style2 {color: #000000; font-weight: bold; }
    .style3 {
	color: #FF0000;
	font-weight: bold;
}
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
                            </ul><ul class="navbar-nav nav-right ml-auto"> 
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
                            
                            <li><a href="{{ route('user-about') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">About Me</span></a> </li>
                            <li><a href="{{ route('user-role') }}" aria-expanded="false"><i class="nav-icon ti ti-info"></i><span class="nav-title">Roles</span></a> </li>
                            <li><a href="{{ route('user-skill') }}" aria-expanded="false"><i class="nav-icon ti ti-layout-grid4-alt"></i><span class="nav-title">Skills/Expertise</span></a> </li>
                            <li><a href="{{ route('user-service') }}" aria-expanded="false"><i class="nav-icon ti ti-layout-grid4-alt"></i><span class="nav-title">Services</span></a> </li>
                            <li><a href="{{ route('user-education') }}" aria-expanded="false"><i class="nav-icon ti ti-layout"></i><span class="nav-title">Education/Certification</span></a> </li>
                            <li><a href="{{ route('user-experience') }}" aria-expanded="false"><i class="nav-icon ti ti-pencil-alt"></i><span class="nav-title">Work Experience</span></a> </li> 
                            <li><a href="{{ route('user-portfolio') }}" aria-expanded="false"><i class="nav-icon ti ti-list"></i><span class="nav-title">Project</span></a> </li>                          
                            <li class="active"><a href="{{ route('user-message') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Message</span><span class="nav-label label label-success">{{$unreadMessagesCount}}</span></a></li>
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
                                        <h1>Message</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                    <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item"> TalentLoom</li>
<li class="breadcrumb-item active text-primary" aria-current="page"><a href="{{route('user-message')}}">Message</a></li>

                                                <li class="breadcrumb-item active text-primary" aria-current="page"><a href="user-portfolio">Project</a></li>
                                                 <li class="breadcrumb-item text-primary" aria-current="page"><a href="{{route('user-about')}}">About</a></li>
                                                <li class="breadcrumb-item text-primary" aria-current="page"><a href="{{route('user-role')}}">Roles</a></li>
                                                <li class="breadcrumb-item text-primary" aria-current="page"><a href="{{route('user-experience')}}">Experience</a></li>
                                                <li class="breadcrumb-item text-primary" aria-current="page"><a href="{{route('user-skill')}}">Skills</a></li>
                                                <li class="breadcrumb-item text-primary" aria-current="page"><a href="{{route('user-education')}}">Education</a></li>
                                                <li class="breadcrumb-item text-primary" aria-current="page"><a href="{{route('user-service')}}">Services</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!--mail-read-contant-start-->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            <div class="col-xl-4 col-xxl-3">
                                                <div class="app-chat-sidebar border-right border-md-n h-100">
                                                    <div class="app-chat-sidebar-search px-4 pb-4 pt-4 border-bottom">
                                                    <div class="text-center mail-sidebar-title px-4">
                                                                <a href="{{route('user-message')}}" class="btn btn-primary btn-block py-3 font-weight-bold font-18">Inbox </a>
                                                            </div>
                                                    </div>
                                                    <div class="app-chat-sidebar-user scrollbar scroll_dark">
                                                        
                                                        <div class="app-chat-sidebar-user-item">
                                                        @if($userMessages->count() == 0)
                                                        <p align="center"> Inbox empty.</p>
                                                        @else
                                                        @foreach($userMessages as $message)
                                                        <a href="{{route('user-message-view', ['id' => $message->user_id])}}">
                                                            <div class="d-flex">
                                                                <div class="bg-img">
                                                                    <img class="img-fluid" src="{{ asset('storage/app/public/' . $message->user_picture) }}" alt="user">
                                                                    <i class="bg-img-status bg-danger"></i>
                                                                </div>
                                                                <div>
                                                                    <h5 class="mb-0">{{ $message->full_name}}</h5>
                                                                    <p><span><i class="zmdi zmdi-check-all mr-2"></i></span>{{ $message->message_type }}</p>
                                                                   
                                                                </div>
                                                                <!-- @if($message->message_status === 'Unread')
                                                                    <div class="ml-auto text-right d-none d-xl-block">                                                                    
                                                                        <span class="badge badge-success">{{ $message->message_count }}</span>
                                                                    </div>
                                                                @elseif($message->message_status === 'Read')
                                                                    <div class="ml-auto text-right d-none d-xl-block">                                                                    
                                                                        <span class="badge badge-danger">{{ $message->message_count }}</span>
                                                                    </div>
                                                                @endif -->
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                            
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-xxl-9 border-md-t">
                                                <div class="app-chat-msg">
                                                    <div class="d-flex align-items-center justify-content-between p-3 px-4 border-bottom">
                                                        <div class="app-chat-msg-title">
                                                        @foreach($userMessages as $message)
                                                            <h4 class="mb-0">{{ $message->full_name }}</h4>
                                                            <p class="text-success">
                                                            {{ $message->from_user_type }}
                                                            </p>
                                                            @endforeach
                                                        </div>
                                                        <div class="app-chat-msg-btn">
                                                            
                                                            <!-- <a aria-expanded="false" aria-haspopup="true" class="font-20 text-muted btn pr-0" data-toggle="dropdown" href="javascript:void(0)">
                                                                <i class="fa fa-gear"></i>
                                                            </a>
                                                            <div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
                                                                <h6>Action</h6> 
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                <i class="ti ti-pencil pr-2"></i>Reply
                                                                </a>                                                               
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="ti ti-announcement pr-2"></i>Mark as Read
                                                                </a>                                                               
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="ti ti-trash pr-2"></i>Delete
                                                                </a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="scrollbar scroll_dark app-chat-msg-chat p-4">
                                                    <div class="message-container" style="height: 400px; overflow-y: auto;">
                                                        @foreach($allUserMessages as $userMessage)
                                                            <div class="text-center py-4">
                                                            <h6>{{ $userMessage->created_at->format('M d, Y h:i:s A') }}</h6>

                                                            </div>
                                                            <div class="chat">
                                                                <div class="chat-img">
                                                                    <a data-placement="left" data-toggle="tooltip" href="javascript:void(0)">
                                                                        <div class="bg-img">
                                                                            <img class="img-fluid" src="{{ asset('storage/app/public/' . $userMessage->user_picture) }}" alt="user">
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="chat-msg">
                                                                    <div class="chat-msg-content">
                                                                        <p>{!!$userMessage->message!!}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    </div>
                                                </div>
                                               
                                                <div class="app-chat-type">
                                                    <div class="input-group mb-0 ">
                                                        
                                                    <form action="{{route('reply-message-action')}}" method="post"><div class="app-chat-type">
                                                @csrf
                                                    <div class="input-group mb-0 ">
                                                        @if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                    @elseif(session('error'))
                                                    <div class="alert alert-danger">
                                                        {{ session('error') }}
                                                    </div>
                                                    @endif 
                                                    <textarea id="editor1" name="message" rows="10" cols="50"  required></textarea>
                                                  </div>
                                                  <hr>
                                                  <div><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button></div>
                                                </div>
                                                @foreach($userMessages as $message)
                                                <input type="hidden" name="from_user_id" value="{{auth()->user()->id}}">
                                                <input type="hidden" name="to_user_id" value="{{$message->user_id}}">
                                                <input type="hidden" name="from_user_email" value="{{auth()->user()->email}}">
                                                <input type="hidden" name="to_user_email" value="{{$message->from_user_email}}">
                                                <input type="hidden" name="from_user_fullname" value="{{auth()->user()->full_name}}">
                                                <input type="hidden" name="to_user_fullname" value="{{$message->full_name}}">
                                                <input type="hidden" name="from_user_type" value="{{auth()->user()->user_type}}">
                                                <input type="hidden" name="to_user_type" value="{{$message->from_user_type}}">
                                                <input type="hidden" name="from_user_picture" value="{{auth()->user()->user_picture}}">
                                                <input type="hidden" name="to_user_picture" value="{{$message->from_user_picture}}">
                                                @endforeach
                                            </form>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--mail-read-contant-end-->
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
<script src="{{asset('dashback/assets/ckeditor/ckeditor.js')}}"></script>
</body>

<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //CK Editor
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
  });
</script>

</html>