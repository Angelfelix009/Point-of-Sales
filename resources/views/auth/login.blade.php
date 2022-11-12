<!DOCTYPE html>
<html lang="en">
<head>
    <title>::Navigand Limited POS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('public/images/logo/icon.png')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(public/images/banner/bg-01.jpg);">
                    <span><h1 class="text-white">Navigand Limited</h1></span><br>
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            @csrf
             @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
                    @include('inc.message')
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" value="{{old('email')}}" placeholder="Enter email" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </div>

                        <div>
                             @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<!--===============================================================================================-->
    <script src="{{asset('public/front/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('public/front/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('public/front/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('public/front/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('public/front/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('public/front/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('public/front/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('public/front/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('public/front/js/main.js')}}"></script>

</body>
</html>