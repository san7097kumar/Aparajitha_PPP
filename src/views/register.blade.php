

@extends('aparajitha_ppp::layout.master')

@section('content')

        <!-- Login Section-->
        <section class="page-section mt-4" id="contact">
            <div class="container ">

                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Register</h2>

                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
           
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">

                        <!-- to get an API token!-->
                        <form method="post" action="/register" >
                            @csrf
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" value="{{old('name')}}" autocomplete="off" id="text" type="text" placeholder="Name" />
                                <label for="name">Name</label>
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" value="{{old('email')}}" autocomplete="off" id="email" type="email" placeholder="name@example.com" />
                                <label for="email">Email address</label>
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
                            <div class="form-floating mb-3">
                                <input class="form-control" name="confirm_password" autocomplete="off" id="password" type="password" placeholder="password" />
                                <label for="password">Confirm Password</label>
                                @error('confirm_password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
