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
          @if(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
						@endif
            <div class="title">Login</div>
            <hr><br>
          <form action="">
            <div>
              <div>                
                <h3>Account Locked</h3>
                
                <p>For your account's security, we have temporarily locked access due to multiple unsuccessful login attempts. 
                    This is a precautionary measure to protect your account from unauthorized access.</p>
                    <h4>What can you do ?</h4>
                    <hr>
                    
                    <p>1. If you've forgotten your password or suspect unauthorized login attempts, you can <a href="{{route('password.request')}}">reset your password</a>, to regain access to your account.</p>
                    <p>2. If you believe this lockout is an error or need immediate assistance, please contact our support team at [support email:meetme@kingsconsult.com.ng].</p>
                    <hr>
                    <p>Thank you for understanding, and we apologize for any inconvenience.</p>
              </div> 
              <div class="button input-box">
                <a href="{{route('login')}}">Back to Login</a>
              </div>          
            </div>
        </form>
      </div>
        
    </div>
    </div>
  </div>
</body>
</html>
