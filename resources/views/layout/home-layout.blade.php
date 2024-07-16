<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{asset('homeback/img/favicon_new.png')}}">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>@yield('pageTitle')</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('homeback/css/linearicons.css')}}">
			<link rel="stylesheet" href="{{asset('homeback/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('homeback/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('homeback/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('homeback/css/nice-select.css')}}">					
			<link rel="stylesheet" href="{{asset('homeback/css/animate.min.css')}}">
			<link rel="stylesheet" href="{{asset('homeback/css/owl.carousel.css')}}">
			<link rel="stylesheet" href="{{asset('homeback/css/main.css')}}">
			
			<style>
				.profile-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: inherit;
}

.profile-frame {
    width: 40px; /* Adjust the size as needed */
    height: 40px; /* Adjust the size as needed */
    /* border: 1px solid #FFFFFF; Adjust the border style and color as needed */
    border-radius: 50%; /* Makes it a circle */
    overflow: hidden;
    margin-right: 10px; /* Adjust the spacing as needed */
	
}

.profile-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile-link span {
    font-weight: bold;
}

			</style>
			<style>
	.message-icon-wrapper {
  position: relative;
  display: inline-block;
}

.message-icon {
  width: 24px; /* Adjust the size as needed */
  height: auto;
}

.badge {
  position: absolute;
  top: -10px; /* Adjust as needed */
  right: -10px; /* Adjust as needed */
  background-color: red;
  color: white;
  border-radius: 50%;
  padding: 5px 10px;
  font-size: 12px;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
}

.blink {
  animation: blink-animation 1s steps(2, start) infinite;
}

@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}

			</style>
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="{{route('home')}}"><img src="{{asset('homeback/img/logo1.png')}}" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">				          
						  <!-- check if the user is authenticated -->
				          @auth
						  <!-- //-----check if user is freelancer or organization---- -->
						  @if (auth()->user()->user_type == 'Organization')
						  <li class="menu-active"><a href="{{route('home')}}">Home</a></li>
				          <li><a href="{{route('post-job')}}">Post Jobs</a></li>				          
						  <li><a href="{{route('post-upskill')}}">Upskill Opportunities</a></li>
						  <li><a href="{{route('find-freelancer')}}">Find Freelancers</a></li>
						  <li class="menu-has-children"><a href="">Browse Jobs</a>
				            <ul>
							@if(!empty ($categories))
                                                                    
                            @foreach ($categories as $category)
                            <li><a href="{{route('job-category', ['category' => $category->category])}}">{{$category->category}}</a></li>
                            @endforeach
                            @else                                                                    
                            <li><a href=""></a></li>                                                                   
                            @endif
				            </ul>
				          </li>				          
						  <li>
							<a href="{{ route('user-message') }}" class="message-icon-wrapper">
								<img src="{{ asset('homeback/img/message.png') }}" alt="message_icon" class="message-icon">
								<span class="badge {{ $unreadMessagesCount > 1 ? 'blink' : '' }}">{{ $unreadMessagesCount }}</span>
							</a>
							</li>
						  <li class="menu-has-children">
							<div class="profile-frame">
								<img src="{{ asset('storage/' . auth()->user()->user_picture) }}" alt="Profile Picture">
							</div>	
							<ul>
							<li><a href="{{ route('dashboard-organization') }}">Profile</a></li>
							<li><a href="{{ route('logout') }}">Logout</a></li>
							</ul>
						</li>	
						@elseif (auth()->user()->user_type == 'Freelancer')
						<li class="menu-active"><a href="{{route('home')}}">Home</a></li>
						  <li><a href="{{route('find-upskill')}}">Upskill Opportunities</a></li>						  
				          <li><a href="{{route('search-freelancer')}}">Search Freelancers</a></li>
						  <li class="menu-has-children"><a href="">Browse Jobs</a>
				            <ul>
							@if(!empty ($categories))
                                                                    
                            @foreach ($categories as $category)
                            <li><a href="{{route('job-category', ['category' => $category->category])}}">{{$category->category}}</a></li>
                            @endforeach
                            @else                                                                    
                            <li><a href=""></a></li>                                                                   
                            @endif
				            </ul>
				          </li>	
						  <li>
							<a href="{{ route('user-message') }}" class="message-icon-wrapper">
								<img src="{{ asset('homeback/img/message.png') }}" alt="message_icon" class="message-icon">
								<span class="badge {{ $unreadMessagesCount > 1 ? 'blink' : '' }}">{{ $unreadMessagesCount }}</span>
							</a>
							</li>			          
						  <li class="menu-has-children">
							<div class="profile-frame">
								<img src="{{ asset('storage/' . auth()->user()->user_picture) }}" alt="Profile Picture">
							</div>	
							<ul>
							<li><a href="{{ route('dashboard') }}">Profile</a></li>
							<li><a href="{{ route('logout') }}">Logout</a></li>
							</ul>
						</li>	
						
						@endif
						@endauth

						@guest
						<li class="menu-active"><a href="{{route('home')}}">Home</a></li>
				          <li><a href="{{route('find-freelancer')}}">Find Freelancers</a></li>
						  <li><a href="{{route('find-upskill')}}">Upskill Opportunities</a></li>
						  <li class="menu-has-children"><a href="">Browse Jobs</a>
				            <ul>
							@if(!empty ($categories))
                                                                    
                            @foreach ($categories as $category)
                            <li><a href="{{route('job-category', ['category' => $category->category])}}">{{$category->category}}</a></li>
                            @endforeach
                            @else                                                                    
                            <li><a href=""></a></li>                                                                   
                            @endif
				            </ul>
				          </li>
						<li><a  href="{{ route('signup') }}">Signup</a></li>
						<li><a  href="{{ route('login') }}">Login</a></li>
						@endguest			          				          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">					
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						@auth
						@if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                    @elseif(session('error'))
                                                    <div class="alert alert-danger">
                                                        {{ session('error') }}
                                                    </div>
                                                    @endif 
						@if($totalPercent < 120)
						<!-- Notification -->
						<div class="row">
							<div class="col-md-12">
								<div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none custom-notification" role="alert">
									<strong>Welcome {{auth()->user()->full_name}} !</strong> Your profile is not up to date, 
									@if (auth()->user()->user_type == 'freelancer')
									<a href="{{ route('dashboard') }}">click to update</a>.
									@elseif (auth()->user()->user_type == 'Organization')
									<a href="{{ route('dashboard-organization') }}">click to update</a>.
									@endif									
									<a class="close" data-dismiss="alert" aria-label="Close">
										<img src="{{asset('homeback/img/close.png')}}" alt="">
									</a>
								</div>
							</div>
						</div>
						<!-- end row -->
						@elseif($totalPercent >= 120)
						
						@endif
						@endauth
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								<span>{{$totalRecords}}+</span> Jobs posted				
							</h1>	
							<form action="{{ route('search-jobs') }}" method="POST" class="serach-form-area">
								@csrf
								<div class="row justify-content-center form-wrap">
									<div class="col-lg-4 form-cols">
										<input type="text" class="form-control" name="job_title" placeholder="what are you looking for?">
									</div>
									
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<select name="job_category">
											@if(!empty ($categories))
                                                                    
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                                                                    @endforeach
                                                                    @else                                                                    
                                                                        <option value=""></option>                                                                    
                                                                    @endif
											</select>
										</div>										
									</div>
									<div class="col-lg-2 form-cols">
									    <button type="submit" class="btn btn-info">
									      <span class="lnr lnr-magnifier"></span> Search
									    </button>
									</div>								
								</div>
							</form>	
							<p class="text-white"> <span>Search by tags:</span> @if (!empty($categories))
        <?php
        $categoryNames = [];
        foreach ($categories as $category) {
            $categoryNames[] = $category->category;
        }
        echo implode(', ', $categoryNames);
        ?>
    @endif</p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start features Area -->
			<section class="features-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Search</h4>
								<p>
								Find your dream job with a click.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Apply</h4>
								<p>
								Streamline your application process effortlessly.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Security</h4>
								<p>
								Your data, your privacy, our priority.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Notifications</h4>
								<p>
								Stay in the loop, never miss an opportunity.
								</p>
							</div>
						</div>																		
					</div>
				</div>	
			</section>
			<!-- End features Area -->
<hr>
<!-- Start popular-post Area -->
<section class="popular-post-area pt-100">
				<div class="container">
					<div class="row align-items-center">
						<div class="active-popular-post-carusel">
						@foreach($postJobAll as $job)	
							<div class="single-popular-post d-flex flex-row">
								<div class="thumb">
									<img class="img-fluid" src="{{ asset('storage/' . $job->company_logo) }}" alt="" style="width: 80px; height: 80px;">
									<a class="btns text-uppercase" href="{{route('view-job', ['id' => $job->id])}}">view job post</a>
								</div>
								<div class="details">
									<a href="#"><h4>{{$job->job_name}}</h4></a>
									<h6>{{$job->job_location}}</h6>
									<p>{{$job->job_type}}</p>
									<p>{{$job->job_payment}}</p>
								</div>
							</div>	
								@endforeach				
																																												
						</div>
					</div>
				</div>	
			</section>
			<!-- End popular-post Area -->
			 <hr>
			<!-- Start feature-cat Area -->
			<section class="feature-cat-area pt-100" id="category">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Featured Job Categories</h1>
								<p>Finding your dream job made easier.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Sales and Marketing']) }}">
									<img src="homeback/img/o1.png" alt="">
								</a>
								<p>Sales & Marketing</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Development and Programming']) }}">
									<img src="homeback/img/o2.png" alt="">
								</a>
								<p>Development and Programming</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Customer Service']) }}">
									<img src="homeback/img/o3.png" alt="">
								</a>
								<p>Customer Service</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Design and Creative']) }}">
									<img src="homeback/img/o4.png" alt="">
								</a>
								<p>Design and Creative</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Nonprofit and Volunteer']) }}">
									<img src="homeback/img/o5.png" alt="">
								</a>
								<p>Nonprofit and Volunteer</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Finance']) }}">
									<img src="homeback/img/o6.png" alt="">
								</a>
								<p>Finance</p>
							</div>			
						</div>																											
					</div>
					<div class="row">
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Human Resource']) }}">
									<img src="homeback/img/o7.png" alt="">
								</a>
								<p>Human Resource</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Education']) }}">
									<img src="homeback/img/o8.png" alt="">
								</a>
								<p>Education</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Transportation and Logistics']) }}">
									<img src="homeback/img/o9.png" alt="">
								</a>
								<p>Transportation and Logistics</p>
							</div>
						</div>	
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="{{ route('job-category', ['category' => 'Health Care']) }}">
									<img src="homeback/img/o10.png" alt="">
								</a>
								<p>Health Care</p>
							</div>
						</div>																															
					</div>
				</div>	
			</section>
			<!-- End feature-cat Area -->
			<hr>
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
				<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Latest Jobs</h1>
								<p>Start applying for your dream jobs.</p>
							</div>
						</div>
					</div>	
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">							
							@if($postJob->isEmpty())
                            <div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="{{ asset('storage/' . 'company_logo/blank.jpg') }}" alt="" width="60" height="60">
									<ul class="tags">
										<li>
											<a href="#"></a>
										</li>										
									</ul>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">											
											<strong><h4>No jobs posted yet for {{$category->category}} category, check back later</h4></strong>					
										</div>
										<ul class="btns">
											
										</ul>
									</div>
									<p>
										
									</p>
									<h5></h5>
									
								</div>
							</div>							
                            @else
                            @foreach($postJob as $job)
                            <div class="single-post d-flex flex-row">
								<div class="thumb">
                                <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Company Logo" width="60" height="60">
									
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="#"><h4>{{$job->job_name}}</h4></a>
											<h6 class="style1">{{$job->job_category}} || <i>Posted {{ $job->created_at->diffForHumans() }}</i> </h6>					
									  </div>
                                        
									</div> 
                                        <hr>
								  <h5>Job Nature: {{$job->job_type}}</h5>
									<p class="address"><span class="lnr lnr-map"></span> {{$job->job_location}}</p>
									<p class="address"><span class="lnr lnr-database"></span> {{$job->job_payment}}</p>
									<ul class="btns">                             
											<li><a href="{{route('view-job', ['id' => $job->id])}}">View Job Details</a></li>                                            
										</ul>
								</div>
							</div>
                            @endforeach
                            {{ $postJob->links() }}
                            @endif							

						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>Upskill Opportunities</h4>
								@if(!empty($postUpskill))
								<div class="active-relatedjob-carusel">									
									@foreach ($postUpskill as $postUpskills)
									<div class="single-rated">
										<img class="img-fluid" src="{{ asset('storage/' . $postUpskills->company_logo) }}" alt="" width="100" height="50">
										<a href="#"><h4>{{$postUpskills->upskill_name}}</h4></a>
										<h6>Created by : {{$postUpskills->company_name}}</h6>										
										<a href="{{route('view-upskill', ['id' => $postUpskills->id])}}" class="btns text-uppercase">View Details</a>
									</div>	
									@endforeach																								
								</div>
								@else									
									<p>Upskill opportunities not available at the moment, check back later.</p>
									@endif																				
							</div>							
							<div class="single-slidebar">
								<h4>Jobs by Location</h4>
								<ul class="cat-list">
								@if($jobLocation->isEmpty())
									<li><a class="justify-content-between d-flex" href="#"><p>Job location unavailable</p><span></span></a></li>
								@else
                                @foreach($jobLocation as $jobLocations)
                                <li><a class="justify-content-between d-flex" href="{{route('job-location', ['id' => $jobLocations->job_location])}}"><p>{{$jobLocations->job_location}}</p><span>{{$jobLocations->location_count}}</span></a></li>
                                @endforeach
                                {{ $jobLocation->links() }}
                                @endif
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->
				

			<!-- Start callto-action Area -->
			<section class="callto-action-area section-gap" id="join">
				<div class="container">
					@auth
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								@if(auth()->user()->user_type == 'Freelancer')
								<h4 class="mb-10 text-white">Increase your chances of landing your dream job, by optimizing your profile.</h4>
								<a class="primary-btn" href="{{route('dashboard')}}">Optimize Profile</a>
								@elseif(auth()->user()->user_type == 'Organization')
								<h4 class="mb-10 text-white">Increase your chances of getting the best freelancer for your job, by optimizing your profile.</h4>
								<a class="primary-btn" href="{{route('dashboard-organization')}}">Optimize Profile</a>
								@endif
							</div>
						</div>
					</div>	
					@endauth

					@guest
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
								<a class="primary-btn" href="{{route('signup')}}">Sign Up</a>
								
							</div>
						</div>
					</div>	

					@endguest
				</div>	
			</section>
			<!-- End calto-action Area -->

					
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Quick Links</h6>
								<ul class="footer-nav">
									<li><a href="{{route('find-freelancer')}}">Find Freelancers</a></li>
									<li><a href="{{route('find-job')}}">Find Jobs</a></li>
									<li><a href="{{route('find-upskill')}}">Upskill Opportunities</a></li>
									<li><a href="{{route('signup')}}">Sign Up</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>You can trust us. we only send latest updates, not a single spam.</p>
								<div id="mc_embed_signup">
									<form  action="{{route('subscribe-newsletter')}}" method="POST" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Enter Email" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter Email '" required="" type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="email" tabindex="-1" value="" type="text">
												</div>
											</div> 
										
											<div class="col-lg-4 col-md-12">
												<button type="submit" class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
											</div> 
										</div>		
										<div class="info"></div>
									</form>
								</div>		
							</div>
						</div>
										
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						 <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered by <a href="https://kingsconsult.com.ng" target="_blank">Kings Branding Consult</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="https://www.facebook.com/kingsbconsult" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="https://instagram.com/kings_branding_consult" target="_blank"><i class="fa fa-instagram"></i></a>
							<a href="https://www.linkedin.com/company/kings-branding-consult/" target="_blank"><i class="fa fa-linkedin"></i></a>
							
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->

			<script src="{{asset('homeback/js/vendor/jquery-2.2.4.min.js')}}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.homeback/js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{asset('homeback/js/vendor/bootstrap.min.js')}}"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="{{asset('homeback/js/easing.min.js')}}"></script>			
			<script src="{{asset('homeback/js/hoverIntent.js')}}"></script>
			<script src="{{asset('homeback/js/superfish.min.js')}}"></script>	
			<script src="{{asset('homeback/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('homeback/js/jquery.magnific-popup.min.js')}}"></script>	
			<script src="{{asset('homeback/js/owl.carousel.min.js')}}"></script>			
			<script src="{{asset('homeback/js/jquery.sticky.js')}}"></script>
			<script src="{{asset('homeback/js/jquery.nice-select.min.js')}}"></script>			
			<script src="{{asset('homeback/js/parallax.min.js')}}"></script>		
			<script src="{{asset('homeback/js/mail-script.js')}}"></script>	
			<script src="{{asset('homeback/js/main.js')}}"></script>	
		</body>
	</html>



