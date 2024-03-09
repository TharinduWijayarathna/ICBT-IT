@extends('public.layouts.app')
@section('content')
    <!-- Team -->
    <section class="position-relative pt-5 mt-lg-3 mt-xl-4 mt-xxl-5">
        <div class="position-absolute w-100 start-0 bottom-0 overflow-hidden">
            <div class="text-primary opacity-10" style="width: 3840px; height: 250px;">
                <svg width="3840" height="250" viewBox="0 0 3840 250" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3840,32.1V250H0V32.1c72.5,0,112.1-17.4,271.6,5.5c199.3,28.5,206,34.7,378.4,29c172.4-5.7,287.8-34.5,418.9-34.5S1317,55.2,1430,48.4c113-6.8,176.5-37.9,248-45.9c15.4-1.7,33-2.6,51.8-2.6c68.4,0.1,166.7,14,223.1,23.4c84.8,6.6,128.1,27.8,288.5,43.5c199.8,19.5,156.2,5.5,328.6-0.2c172.4-5.7,287.8-34.5,418.9-34.5c131.1,0,248.1,23.1,361.1,16.3c113-6.8,176.5-37.9,248-45.9c15.4-1.7,33-2.6,51.8-2.6C3718.2,0,3800.9,11.2,3840,32.1z">
                    </path>
                </svg>
            </div>
        </div>
        <div class="container position-relative z-2 pb-3 pt-2 pt-sm-3 pt-md-4 pt-lg-5 mt-md-3 mt-xxl-2 mb-3 mb-lg-4">
            <div class="text-center mx-auto" style="max-width: 460px;">
                <h2 class="h1">We are all passionate about what we do</h2>
                <svg class="d-inline-block heartbeat text-danger" width="52" height="38" viewBox="0 0 52 38"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M52,6.3c0.8-12.6-18.6-4-24.8,1.6c-0.4,0.4-1.1,0.4-1.5,0.1C9.9-2.7-2,1.5,0.3,10c1.5,5.6,16.2,20.4,25.5,27.7c0.4,0.3,1,0.3,1.4,0C36.7,29.5,51.2,19.1,52,6.3z">
                    </path>
                </svg>
            </div>
        </div>
        <div class="container pe-0">

            <div class="row">

                <!-- Item -->
                <div class="swiper-slide w-auto">
                    <div class="card-hover text-center" style="max-width: 306px;">
                        <img class="d-block rounded-5 mb-4"
                            src="{{ asset('assets/web/img/landing/creative-agency/team/02.jpg') }}" alt="Image">
                        <h3 class="h5 mb-1">Alisa Black</h3>
                        <p class="text-body-secondary mb-2">Head of marketing</p>
                        <div class="d-none d-lg-flex nav justify-content-center opacity-0">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="LinkedIn">
                                <i class="ai-linkedin"></i>
                            </a>
                        </div>
                        <div class="d-lg-none nav justify-content-center">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="LinkedIn">
                                <i class="ai-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide w-auto">
                    <div class="card-hover text-center" style="max-width: 306px;">
                        <img class="d-block rounded-5 mb-4"
                            src="{{ asset('assets/web/img/landing/creative-agency/team/01.jpg') }}" alt="Image">
                        <h3 class="h5 mb-1">Guy Hawkins</h3>
                        <p class="text-body-secondary mb-2">President of Sales</p>
                        <div class="d-none d-lg-flex nav justify-content-center opacity-0">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#" aria-label="X">
                                <i class="ai-x"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                        </div>
                        <div class="d-lg-none nav justify-content-center">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#" aria-label="X">
                                <i class="ai-x"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide w-auto">
                    <div class="card-hover text-center" style="max-width: 306px;">
                        <img class="d-block rounded-5 mb-4"
                            src="{{ asset('assets/web/img/landing/creative-agency/team/06.jpg') }}" alt="Image">
                        <h3 class="h5 mb-1">Robert Fox</h3>
                        <p class="text-body-secondary mb-2">Web Designer</p>
                        <div class="d-none d-lg-flex nav justify-content-center opacity-0">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Behance">
                                <i class="ai-behance"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="Dribbble">
                                <i class="ai-dribbble"></i>
                            </a>
                        </div>
                        <div class="d-lg-none nav justify-content-center">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Behance">
                                <i class="ai-behance"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="Dribbble">
                                <i class="ai-dribbble"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide w-auto">
                    <div class="card-hover text-center" style="max-width: 306px;">
                        <img class="d-block rounded-5 mb-4"
                            src="{{ asset('assets/web/img/landing/creative-agency/team/04.jpg') }}" alt="Image">
                        <h3 class="h5 mb-1">Jane Cooper</h3>
                        <p class="text-body-secondary mb-2">Marketing Coordinator</p>
                        <div class="d-none d-lg-flex nav justify-content-center opacity-0">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="LinkedIn">
                                <i class="ai-linkedin"></i>
                            </a>
                        </div>
                        <div class="d-lg-none nav justify-content-center">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="LinkedIn">
                                <i class="ai-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide w-auto">
                    <div class="card-hover text-center" style="max-width: 306px;">
                        <img class="d-block rounded-5 mb-4"
                            src="{{ asset('assets/web/img/landing/creative-agency/team/03.jpg') }}" alt="Image">
                        <h3 class="h5 mb-1">Cody Fisher</h3>
                        <p class="text-body-secondary mb-2">SMM Specialist</p>
                        <div class="d-none d-lg-flex nav justify-content-center opacity-0">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#" aria-label="X">
                                <i class="ai-x"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#"
                                aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                        </div>
                        <div class="d-lg-none nav justify-content-center">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#" aria-label="X">
                                <i class="ai-x"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#"
                                aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide w-auto">
                    <div class="card-hover text-center" style="max-width: 306px;">
                        <img class="d-block rounded-5 mb-4"
                            src="{{ asset('assets/web/img/landing/creative-agency/team/05.jpg') }}" alt="Image">
                        <h3 class="h5 mb-1">Jacob Jones</h3>
                        <p class="text-body-secondary mb-2">Web Designer</p>
                        <div class="d-none d-lg-flex nav justify-content-center opacity-0">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Behance">
                                <i class="ai-behance"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="Dribbble">
                                <i class="ai-dribbble"></i>
                            </a>
                        </div>
                        <div class="d-lg-none nav justify-content-center">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Behance">
                                <i class="ai-behance"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="Dribbble">
                                <i class="ai-dribbble"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide w-auto">
                    <div class="card-hover text-center" style="max-width: 306px;">
                        <img class="d-block rounded-5 mb-4"
                            src="{{ asset('assets/web/img/landing/creative-agency/team/03.jpg') }}" alt="Image">
                        <h3 class="h5 mb-1">Cody Fisher</h3>
                        <p class="text-body-secondary mb-2">SMM Specialist</p>
                        <div class="d-none d-lg-flex nav justify-content-center opacity-0">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#" aria-label="X">
                                <i class="ai-x"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#"
                                aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                        </div>
                        <div class="d-lg-none nav justify-content-center">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#" aria-label="X">
                                <i class="ai-x"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#"
                                aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide w-auto">
                    <div class="card-hover text-center" style="max-width: 306px;">
                        <img class="d-block rounded-5 mb-4"
                            src="{{ asset('assets/web/img/landing/creative-agency/team/05.jpg') }}" alt="Image">
                        <h3 class="h5 mb-1">Jacob Jones</h3>
                        <p class="text-body-secondary mb-2">Web Designer</p>
                        <div class="d-none d-lg-flex nav justify-content-center opacity-0">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Behance">
                                <i class="ai-behance"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="Dribbble">
                                <i class="ai-dribbble"></i>
                            </a>
                        </div>
                        <div class="d-lg-none nav justify-content-center">
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal me-1" href="#"
                                aria-label="Behance">
                                <i class="ai-behance"></i>
                            </a>
                            <a class="nav-link btn btn-icon btn-sm fs-sm fw-normal" href="#" aria-label="Dribbble">
                                <i class="ai-dribbble"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
