
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Password Reset | Aparajitha</title>
        <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Tables are the backbone of almost all web applications.">

        <link rel="stylesheet" href="{{ asset('aparajitha/assets/css/fonts.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <link href="{{ asset('aparajitha/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('aparajitha/css/login.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('aparajitha/favicon16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('aparajitha/favicon32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('aparajitha/favicon96x96.png') }}" sizes="96x96">
    </head>

    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <img src="{{ asset('aparajitha/assets/images/logo-inverse.png') }}" class="float-right top-logo" alt="Aparajitha logo">
    
    </div>
    
    </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
            <div class="circles">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            </div>
                <div class="design-wrap mt-5 m-lg-5 m-md-0 mt-md-5 m-sm-5">
                <div class="ring"></div>
                <div class="star"><img src="{{ asset('aparajitha/assets/images/star.png') }}" alt=""><img src="{{ asset('aparajitha/assets/images/star.png') }}" alt="" class="small-star"></div>
                    <h2 class="titles mb-3 title-main">Reset Password </h2>
                        @if(session()->has('success'))
                        <span class="success-msg">{{ session()->get('success')}}</span>
                        @endif
                        @if(session()->has('error'))
                            <span class="login-err"> {{ session()->get('error')}}</span>
                        @endif
                        @error('email')
                                <span class="login-err">{{ $message }}</span>
                        @enderror
                        @error('new_password')
                        <span class="login-err">{{ $message }}</span>
                        @enderror
                        @error('confirm_password')
                        <span class="login-err">{{ $message }}</span>
                        @enderror
                     <div class="input-wrap">
                     <form action="{{route('update_password')}}" method="post">

                        @csrf
                         
                         <!-- <label class="label" for="email">Please enter your Email address</label> -->
                            <input id="email" autocomplete="off" type="email" placeholder=" email address" name="email" class="input email-input mt-3 mb-3 @error('email') is-invalid @enderror"  value="{{ old('email') }}"  required autocomplete="email" autofocus>
                            <input id="new_password" autocomplete="off" type="password" placeholder="new password" name="new_password" class="input email-input mt-3 mb-3 @error('new_password') is-invalid @enderror"  value="{{ old('new_password') }}"  required >
                            <input id="confirm_password" autocomplete="off" type="password" placeholder="confirm password" name="confirm_password" class="input email-input mt-3 mb-3 @error('confirm_password') is-invalid @enderror"  value="{{ old('confirm_password') }}"  required >
                            <input type="hidden" value="{{$token}}" name="token"/>
                            
                            <button type="submit" class="my-btn login-btn">Submit <span><i class="fa fa-chevron-right btn-icon"></i></span></button>

                            {{-- <a class="forgot" href="{{route('login')}}">Back to Sign In</a> --}}
                         
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            
            </div>
        </div>
    </div>


