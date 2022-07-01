
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Log in | Aparajitha</title>
        <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Tables are the backbone of almost all web applications.">
        <link href="{{ asset('aparajitha/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('aparajitha/css/login.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('aparajitha/favicon16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('aparajitha/favicon32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('aparajitha/favicon96x96.png') }}" sizes="96x96">
    </head>
<style>

    </style>
    <style>
    
    </style>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <img src="{{ asset('aparajitha/assets/images/logo-inverse.png') }}" class="float-right top-logo" alt="Aparajitha logo">
    
    </div>
    
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="circles">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            </div>
                <div class="design-wrap mt-5 m-lg-5 m-md-0 mt-md-5 m-sm-5">
                <div class="ring"></div>
                <div class="star"><img src="{{ asset('aparajitha/assets/images/star.png') }}" alt=""><img src="{{ asset('aparajitha/assets/images/star.png') }}" alt="" class="small-star"></div>
                    <h2 class="titles mb-0 title-main">Sign In</h2>
                    <small class="small-text">Let's get started</small> <br>
                        @if(session()->has('error'))
                            <span class="login-err"> {{ session()->get('error')}}</span>
                        @endif
                        @error('email')
                                <span class="login-err">Incorrect email or password</span>
                        @enderror
                        @error('password')
                                <span class="login-err">Incorrect email or password</span>
                        @enderror
                     <div class="input-wrap">
                        {{-- @dd($url); --}}
                        <form action="{{route('login')}}" method="post">
                        @csrf
                         
                         <label class="label" for="email">Email </label>
                            <input id="email" autocomplete="off" type="email" placeholder="Email" name="email" class="input email-input mb-3 @error('password') is-invalid @enderror"  value="{{ old('email') }}"  required autocomplete="email" autofocus>
                       
                            <br>
                            <label class="label" for="password">Password</label>
                            <input id="password"  placeholder="Password" name="password" type="password" class="input password-input mb-3 @error('password') is-invalid @enderror"><br>
                           
                            <input placeholder="Confirm Password" type="password" class="input confirm-input mb-3" >
                            <button type="submit" class="my-btn login-btn">Sign In <span><i class="fa fa-chevron-right btn-icon"></i></span></button>

                            {{-- <a class="forgot" href="{{route('forgot_password')}}">Forgot Password</a> --}}
                         
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            
            </div>
        </div>
    </div>


<script>
    window.addEventListener('storage', function(event){
        if (event.key == 'login-event') { 
            // var pathname = window.location.pathname; 
            // console.log(pathname);
            window.location.replace(document.referrer);
        }
    });
</script>