<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/favicon_new.png">
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
		</head>
		<body>

        <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="{{route('dashboard')}}"><img src="{{asset('homeback/img/loom_logo.png')}}" alt="" title="" /></a>
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
						<li><a class="ticker-btn" href="{{ route('dashboard') }}">Profile</a></li>
						<li><a class="ticker-btn" href="{{ route('logout') }}">Logout</a></li>
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
								Freelancers				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('home')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Freelancers</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start service Area -->
			<section class="service-area section-gap" id="service">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>Why Choose Us</h1>
							<p>
								Who are in extremely love with eco friendly system.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Expert Technicians</h4>
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-license"></span>Professional Service</h4>
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-phone"></span>Great Support</h4>
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-rocket"></span>Technical Skills</h4>
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>				
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-diamond"></span>Highly Recomended</h4>
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-bubble"></span>Positive Reviews</h4>
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>									
							</div>
						</div>						
					</div>
				</div>	
			</section>
			<!-- End service Area -->						

			<!-- Start feature Area -->
			<section class="feature-area">
				<div class="container-fluid">
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-3 feat-img no-padding">
							<img class="img-fluid" src="img/pages/f1.jpg" alt="">
						</div>
						<div class="col-lg-3 no-padding feat-txt">
							<h6 class="text-uppercase text-white">Basic & Common Repairs</h6>
							<h1>Who we are</h1>
							<p>
								Computer users and programmers have become so accustomed to using Windows, even for the changing capabilities and the appearances of the graphical.
							</p>
						</div>
						<div class="col-lg-3 feat-img no-padding">
							<img class="img-fluid" src="img/pages/f2.jpg" alt="">							
						</div>
						<div class="col-lg-3 no-padding feat-txt">
							<h6 class="text-uppercase text-white">Basic & Common Repairs</h6>
							<h1>What we do</h1>
							<p>
								Computer users and programmers have become so accustomed to using Windows, even for the changing capabilities and the appearances of the graphical.
							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End feature Area -->

			<!-- Start team Area -->
			<section class="team-area section-gap" id="team">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Experienced Mentor Team</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row justify-content-center d-flex align-items-center">
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/pages/t1.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Ethel Davis</h4>
							    <p>Managing Director (Sales)</p>									    	
						    </div>
						</div>
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/pages/t2.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Rodney Cooper</h4>
							    <p>Creative Art Director (Project)</p>			    	
						    </div>
						</div>	
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/pages/t3.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Dora Walker</h4>
							    <p>Senior Core Developer</p>			    	
						    </div>
						</div>	
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/pages/t4.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Lena Keller</h4>
							    <p>Creative Content Developer</p>			    	
						    </div>
						</div>																									
				
					</div>
				</div>	
			</section>
			<!-- End team Area -->			


			<!-- Start callto-action Area -->
			<section class="callto-action-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
								<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<a class="primary-btn" href="#">I am a Candidate</a>
								<a class="primary-btn" href="#">We are an Employer</a>
							</div>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End calto-action Area -->

			<!-- Start testimonial Area -->
			<section class="testimonial-area section-gap" id="review">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Testimonial from our Clients</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-review-carusel">
							<div class="single-review">
								<img src="img/r1.png" alt="">
								<div class="title d-flex flex-row">
									<h4>lorem ipusm</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>	
							<div class="single-review">
								<img src="img/r2.png" alt="">
								<div class="title d-flex flex-row">
									<h4>lorem ipusm</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>	
							<div class="single-review">
								<img src="img/r1.png" alt="">
								<div class="title d-flex flex-row">
									<h4>lorem ipusm</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>	
							<div class="single-review">
								<img src="img/r2.png" alt="">
								<div class="title d-flex flex-row">
									<h4>lorem ipusm</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>								
						</div>
					</div>
				</div>	
			</section>
			<!-- End testimonial Area -->
			
		
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>You can trust us. we only send promo offers, not a single spam.</p>
								<div id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
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
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Instragram Feed</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="img/i1.jpg" alt=""></li>
									<li><img src="img/i2.jpg" alt=""></li>
									<li><img src="img/i3.jpg" alt=""></li>
									<li><img src="img/i4.jpg" alt=""></li>
									<li><img src="img/i5.jpg" alt=""></li>
									<li><img src="img/i6.jpg" alt=""></li>
									<li><img src="img/i7.jpg" alt=""></li>
									<li><img src="img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
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



