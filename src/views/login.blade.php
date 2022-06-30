

@extends('aparajitha_ppp::layout.master')

@section('content')

        <!-- Login Section-->
        <section class="page-section mt-4" id="contact">
            <div class="container ">
                
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
               
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">

             

                    <div class="col-lg-8 col-xl-7">
                        @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close btn btn-sm" data-bs-dismiss="alert">&times;</button>
                            {{session()->get('error')}}
                          </div>
                        @endif
                        <!-- to get an API token!-->
                        <form method="post" action="/login" >
                            @csrf
                            <!-- Name input-->

                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" autocomplete="off" id="email" type="name" placeholder="name" />
                                <label for="email">Email</label>
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                               @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" autocomplete="off" id="password" type="password" placeholder="password" />
                                <label for="password">Password</label>
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                               @enderror
                            </div>

                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>


@endsection
