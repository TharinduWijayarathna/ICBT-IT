@extends('public.layouts.app')
@section('content')
    <!-- Resources (Blog) -->
    <section class="bg-primary bg-opacity-10 py-5">
        <div class="container py-sm-2 pt-md-3 py-lg-2 py-xl-4 py-xxl-5">
            <h3 class="h1 text-center pt-2 pt-sm-3 pb-3 mb-3 mb-lg-4">Our Events</h3>

            <!-- Swiper slider -->
            <div class="row">
                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 10, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Technology</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Tech Expo 2024: Unveiling the Latest Innovations</a>
                            </h3>
                            <p class="card-text">Join us at Tech Expo 2024 to witness groundbreaking innovations in
                                technology. Explore
                                cutting-edge products, attend insightful sessions, and network with industry leaders.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/10.jpg') }}" width="48"
                                    alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 18, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Networking</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Networking Mixer: Connecting Professionals in the IT Industry</a>
                            </h3>
                            <p class="card-text">Join our Networking Mixer to connect with professionals in the IT industry.
                                Expand your
                                professional network, share experiences, and explore collaboration opportunities.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/07.jpg') }}" width="48"
                                    alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 25, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Seminar</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Seminar on Cybersecurity: Ensuring a Secure Digital Future</a>
                            </h3>
                            <p class="card-text">Attend our Cybersecurity Seminar to gain insights into the latest threats,
                                preventive
                                measures, and best practices. Learn from experts and enhance your understanding of
                                cybersecurity.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/09.jpg') }}" width="48"
                                    alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 10, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Technology</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Tech Expo 2024: Unveiling the Latest Innovations</a>
                            </h3>
                            <p class="card-text">Join us at Tech Expo 2024 to witness groundbreaking innovations in
                                technology. Explore
                                cutting-edge products, attend insightful sessions, and network with industry leaders.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/10.jpg') }}" width="48"
                                    alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 18, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Networking</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Networking Mixer: Connecting Professionals in the IT Industry</a>
                            </h3>
                            <p class="card-text">Join our Networking Mixer to connect with professionals in the IT industry.
                                Expand your
                                professional network, share experiences, and explore collaboration opportunities.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/07.jpg') }}" width="48"
                                    alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 25, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Seminar</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Seminar on Cybersecurity: Ensuring a Secure Digital Future</a>
                            </h3>
                            <p class="card-text">Attend our Cybersecurity Seminar to gain insights into the latest threats,
                                preventive
                                measures, and best practices. Learn from experts and enhance your understanding of
                                cybersecurity.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/09.jpg') }}"
                                    width="48" alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 10, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Technology</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Tech Expo 2024: Unveiling the Latest Innovations</a>
                            </h3>
                            <p class="card-text">Join us at Tech Expo 2024 to witness groundbreaking innovations in
                                technology. Explore
                                cutting-edge products, attend insightful sessions, and network with industry leaders.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/10.jpg') }}"
                                    width="48" alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 18, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Networking</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Networking Mixer: Connecting Professionals in the IT Industry</a>
                            </h3>
                            <p class="card-text">Join our Networking Mixer to connect with professionals in the IT
                                industry. Expand your
                                professional network, share experiences, and explore collaboration opportunities.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/07.jpg') }}"
                                    width="48" alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Event -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 25, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Seminar</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Seminar on Cybersecurity: Ensuring a Secure Digital Future</a>
                            </h3>
                            <p class="card-text">Attend our Cybersecurity Seminar to gain insights into the latest threats,
                                preventive
                                measures, and best practices. Learn from experts and enhance your understanding of
                                cybersecurity.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/09.jpg') }}"
                                    width="48" alt="Event organizer">
                                <h6 class="ps-3 mb-0">ICBT IT Society</h6>
                            </a>
                        </div>
                    </div>
                </article>

            </div>

        </div>
    </section>
@endsection
