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
          
            <div class="title">Email Verification</div>
            <hr><br>
          <form action="{{ route('resend-verification') }}" method="POST">
          @csrf
            <div>
              <div>                
                <h3>Please verify your email</h3>                
                <p>Your email address <strong>({{ auth()->user()->email }})</strong> has not been verified, click on the button below to send email verification link.</p>
              </div> 
              <div class="button input-box">
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                <input type="submit" value="Verify Email">
              </div>              
            </div>
        </form>
      </div>
        
    </div>
    </div>
  </div>
</body>
</html>
