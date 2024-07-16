<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{asset('homeback/img/fav.png')}}">
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

			.style1 {
	color: #000000;
	font-weight: bold;
}
            .style2 {color: #000000}
            </style>
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
                      <a href="{{route('dashboard')}}"><img src="{{asset('homeback/img/logo1.png')}}" alt="" title="" /></a>
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
							<div class="profile-frame">
								<img src="{{ asset('storage/' . auth()->user()->user_picture) }}" alt="Profile Picture">
							</div>	
						</li>
						<li><a class="ticker-btn" href="{{ route('dashboard-organization') }}">Profile</a></li>
						<li><a class="ticker-btn" href="{{ route('logout') }}">Logout</a></li>
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
							<div class="profile-frame">
								<img src="{{ asset('storage/' . auth()->user()->user_picture) }}" alt="Profile Picture">
							</div>	
						</li>
						<li><a href="{{ route('dashboard') }}">Profile</a></li>
						<li><a href="{{ route('logout') }}">Logout</a></li>
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
						<li><a class="ticker-btn" href="{{ route('signup') }}">Signup</a></li>
						<li><a class="ticker-btn" href="{{ route('login') }}">Login</a></li>
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
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Job for selected criteria not found, try again.		
							</h1>							
				
						</div>		
						<div class="banner-content col-lg-12">
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
</div>
						
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
		
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
									<form target="_blank" novalidate="true" action="{{route('subscribe-newsletter')}}" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Enter Email" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter Email '" required="" type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
											</div> 
										
											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
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



