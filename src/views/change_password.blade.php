

@extends('aparajitha_ppp::layout.master')

@section('content')

        <!-- Login Section-->
        <section class="page-section mt-4" id="contact">
            <div class="container ">

                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Change Password</h2>

                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
           
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close btn btn-sm" data-bs-dismiss="alert">&times;</button>
                            {{session()->get('success')}}
                          </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close btn btn-sm" data-bs-dismiss="alert">&times;</button>
                            {{session()->get('error')}}
                          </div>
                        @endif

                        <!-- to get an API token!-->
                        <form method="post" action="/change_password" >
                            @csrf
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="old_password" value="{{old('old_password')}}" placeholder="Old Password" autocomplete="off"  type="password"  />
                                <label for="old_password">Old Password</label>
                                @error('old_password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="new_password" value="{{old('new_password')}}" placeholder="New Password" autocomplete="off"  type="password" />
                                <label for="new_password">New Password</label>
                                @error('new_password')
                                <p class="text-danger">{{$message}}</p>
                               @enderror
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" name="confirm_password" autocomplete="off"  type="password" placeholder="password" />
                                <label for="confirm_password">Confirm Password</label>
                                @error('confirm_password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
