@extends('public.layouts.app')
@section('content')
    <!-- Hero -->
    <section class="bg-primary bg-opacity-10 d-flex min-vh-100 overflow-hidden py-5">
        <div class="container d-flex justify-content-center pb-sm-3 py-md-4 py-xl-5">
            <div class="row align-items-center pt-5 mt-4 mt-xxl-0">

                <!-- Video + Parallax -->
                <div class="col-lg-6 mb-4 mb-lg-0 pb-3 pb-lg-0">
                    <div class="parallax mx-auto mx-lg-0" style="max-width: 582px;">
                        <div class="parallax-layer" data-depth="0.3">
                            <img src="{{ asset('assets/web/img/landing/marketing-agency/hero/shape01.svg') }}"
                                alt="Background shape">
                        </div>
                        <div class="parallax-layer z-2" data-depth="-0.1">
                            <img src="{{ asset('assets/web/img/landing/marketing-agency/hero/shape02.svg') }}"
                                alt="Background shape">
                        </div>
                        <div class="parallax-layer" data-depth="-0.15">
                            <img src="{{ asset('assets/web/img/landing/marketing-agency/hero/shape03.svg') }}"
                                alt="Background shape">
                        </div>
                        <div class="parallax-layer z-2" data-depth="-0.25">
                            <img src="{{ asset('assets/web/img/landing/marketing-agency/hero/shape04.svg') }}"
                                alt="Background shape">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-2 pb-3 mb-4">ICBT IT Society</h1>
                    <div class="row row-cols-3">
                        <div class="col">
                            <i class="ai-bulb-alt d-block fs-1 text-dark mb-2 pb-1"></i>
                            <p class="mb-0">Crafting Innovative Solutions for ICBT IT Community</p>
                        </div>
                        <div class="col">
                            <i class="ai-rocket d-block fs-2 text-dark mb-3"></i>
                            <p class="mb-0">Ensuring Rapid Progress and Impactful Outcomes</p>
                        </div>
                        <div class="col">
                            <i class="ai-circle-check-filled d-block fs-3 text-dark mb-3"></i>
                            <p class="mb-0">Punctual Execution of IT Initiatives and Milestones</p>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>


    <!-- Services -->
    <section class="container py-5 my-md-2 my-lg-3 my-xl-4 my-xxl-5">
        <div class="row align-items-center py-1 py-sm-3 py-md-4 my-lg-2">
            <div class="col-lg-4 offset-xl-1">
                <h2 class="h1 text-center text-lg-start pb-3 pb-lg-1">Our Main Responsibilities</h2>

                <!-- Show on screens > 992px -->
                <ul class="list-unstyled d-none d-lg-block pb-3 mb-3 mb-lg-4">
                    <li class="d-flex pt-2">
                        <i class="ai-check-alt fs-4 text-primary mt-n1 me-2"></i>
                        Strategic Planning and Implementation
                    </li>
                    <li class="d-flex pt-2">
                        <i class="ai-check-alt fs-4 text-primary mt-n1 me-2"></i>
                        Ensuring Efficient IT Operations
                    </li>
                    <li class="d-flex pt-2">
                        <i class="ai-check-alt fs-4 text-primary mt-n1 me-2"></i>
                        Collaborating for Technological Advancements
                    </li>
                </ul>

            </div>

            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col">
                        <div class="card border-0 bg-primary bg-opacity-10">
                            <div class="card-body">
                                <i class="ai-search-settings fs-1 text-primary d-block mb-3"></i>
                                <h3 class="h4">Strategic Planning</h3>
                                <p class="fs-sm">Developing and executing strategic plans to meet IT objectives and
                                    organizational goals.</p>
                            </div>
                        </div>
                        <div class="card border-0 bg-info bg-opacity-10 mt-4">
                            <div class="card-body">
                                <i class="ai-bulb-alt fs-1 text-info d-block mb-3"></i>
                                <h3 class="h4">Efficient Operations</h3>
                                <p class="fs-sm">Ensuring the smooth and efficient operation of IT systems and
                                    infrastructure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col pt-lg-3">
                        <div class="card border-0 bg-warning bg-opacity-10 mt-4 mt-sm-0 mt-lg-4">
                            <div class="card-body">
                                <i class="ai-mail-filled fs-1 text-warning d-block mb-3"></i>
                                <h3 class="h4">Technological Collaboration</h3>
                                <p class="fs-sm">Collaborating with stakeholders and teams to implement and adopt new
                                    technologies.</p>
                            </div>
                        </div>
                        <div class="card border-0 bg-danger bg-opacity-10 mt-4">
                            <div class="card-body">
                                <i class="ai-telegram fs-2 text-danger d-block mb-3"></i>
                                <h3 class="h4">Innovation and Improvement</h3>
                                <p class="fs-sm">Driving innovation and continuous improvement in IT processes and
                                    solutions.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>




    <!-- Case studies -->
    <section class="container mb-5">
        <div class="row align-items-center pt-md-4 mt-2 mt-sm-3 ">
            <div class="col-md-6 position-relative pb-3 pb-md-0 mb-2 mb-sm-3 mb-md-0">
                <div class="d-none d-xxl-block position-absolute"
                    style="width: 861px; height: 719px; top: 50px; left: -260px;" data-aos="zoom-in" data-aos-duration="700"
                    data-aos-offset="400">
                    <svg class="text-primary opacity-10" width="861" height="719" viewBox="0 0 861 719"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M25.1985 361.161C26.6142 363.592 28.4042 365.854 30.3902 367.846L115.89 453.613C117.366 455.093 119.008 456.457 120.69 457.697C220.882 531.542 166.267 694.09 321.314 716.256C481 739.09 730.799 588.084 806.496 453.151C844.188 385.962 885.87 273.92 840.453 199.651C808.854 147.97 742.627 142.437 686.285 142.442C616.832 142.453 556.116 167.459 491.294 135.468C449.5 114.831 426.769 82.5406 392.702 51.7928C206.459 -116.148 -88.0611 166.69 25.1985 361.161Z">
                        </path>
                    </svg>
                </div>

                <!-- Binded items -->
                <div class="binded-content z-2">

                    <!-- Item -->
                    @foreach ($events as $event)
                        <div class="binded-item active" id="image1">
                            <img class="d-block rounded-5" src="{{ asset('event_images/' . $event->image->name) }}"
                                alt="Image">
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="col-md-6 col-xl-5 offset-xl-1">
                <div class="ps-md-4 ps-xl-0">

                    <!-- Slider control buttons (Prev / Next) -->
                    <div class="d-flex align-items-center ms-n3 pb-3 mb-sm-2 mb-xl-4">
                        <button class="btn btn-icon btn-link" type="button" id="prev-case-study" aria-label="Prev">
                            <i class="ai-arrow-left"></i>
                        </button>
                        <div class="text-center text-nowrap mx-3" id="slides-count" style="width: 33px;"></div>
                        <button class="btn btn-icon btn-link" type="button" id="next-case-study" aria-label="Next">
                            <i class="ai-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Swiper slider -->
                    <div class="swiper"
                        data-swiper-options='{
          "spaceBetween": 40,
          "autoHeight": true,
          "bindedContent": true,
          "pagination": {
            "el": "#slides-count",
            "type": "fraction"
          },
          "navigation": {
            "prevEl": "#prev-case-study",
            "nextEl": "#next-case-study"
          }
        }'>
                        <div class="swiper-wrapper">

                            @foreach ($events as $event)
                                <!-- Event -->
                                <div class="swiper-slide pb-1" data-swiper-binded="#eventImage1">
                                    <h3 class="h4">{{ $event->title }}</h3>
                                    <p class="pb-3 mb-3 mb-xl-4">{{ $event->description }}</p>
                                    <div class="d-flex d-md-none d-lg-flex justify-content-between w-100 pb-4 pb-xl-5 mb-2 mb-sm-3 mb-xl-2"
                                        style="max-width: 550px;">
                                        <div class="pe-4">
                                            <div class="h6 mb-1">Date: {{ date('d M Y', strtotime($event->start_date)) }}
                                                - {{ date('d M Y', strtotime($event->end_date)) }}</div>
                                            {{-- <div class="fs-sm">Time: 10:00 AM - 5:00 PM</div> --}}
                                        </div>
                                    </div>
                                    <div class="d-sm-flex">
                                        <a class="btn btn-outline-primary w-100 w-sm-auto d-md-none d-lg-inline-flex"
                                            href="{{ route('society.events') }}">View All Events</a>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container pt-5 mt-lg-3 mt-xl-4 mt-xxl-5 mb-5">
    </section>
@endsection
