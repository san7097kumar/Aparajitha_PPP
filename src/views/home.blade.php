
@extends('aparajitha_ppp::layout.master')

@section('content')

        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">

                {{-- <x-success/> --}}
                <!-- Masthead Avatar Image-->
                {{-- <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." /> --}}
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">APARAJITHA</h1>
                <!-- Icon Divider--> 
                {{-- <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div> --}}
                <!-- Masthead Subheading-->
                {{-- <p class="masthead-subheading font-weight-light mb-0"> Lorem ipsum dolor sit amet consectetur.</p> --}}
            </div>
        </header>
        
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Products</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">

                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, eius?</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus dolorum corrupti non.</p></div>
                </div>
                <!-- About Section Button-->
               
            </div>
        </section>

@endsection
