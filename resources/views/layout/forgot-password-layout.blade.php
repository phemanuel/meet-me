<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>@yield('pageTitle')</title>
    <link rel="stylesheet" href="{{asset('loginback/vendor/style/style.css')}}">
    <!-- Fontawesome CDN Link -->
    <link href="{{asset('loginback/vendor/images/favicon_new.png')}}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</style>
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="{{asset('loginback/vendor/images/frontImg.jpg')}}" alt="">
        <div class="text">
          <span class="text-1">Transform your experiences into a visual story</span>
          <span class="text-2">Where your achievements come to life</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="{{asset('loginback/vendor/images/backImg.jpg')}}" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
          @if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
            @elseif(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
            else
						@endif
            
            <div class="title">Reset Password</div>
            @if(auth()->guest())
          <form action="{{ route('password.email') }}" method="POST">
          @csrf			
          <h4>Enter your email address to reset your password</h4>						
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email"  value="{{ old('email') }}" placeholder="Enter your email" required>
                </div>
                @error('email')
									<span class="invalid-feedback">{{ $message }}</span>
									@enderror
                  <div class="text"><a href="{{ route('login') }}">Login</a></div>
              <div class="button input-box">
                <input type="submit" value="{{ __('Send Password Reset Link') }}">
              </div>              
            </div>
        </form>
        @else
    <p>You are already logged in. You cannot reset your password while logged in.</p>
@endif
      </div>
        
    </div>
    </div>
  </div>
</body>
</html>
