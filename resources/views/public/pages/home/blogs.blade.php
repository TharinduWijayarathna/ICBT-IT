@extends('public.layouts.app')
@section('content')
    <!-- Resources (Blog) -->
    <section class="bg-primary bg-opacity-10 py-5">
        <div class="container py-sm-2 pt-md-3 py-lg-2 py-xl-4 py-xxl-5">
            <h3 class="h1 text-center pt-2 pt-sm-3 pb-3 mb-3 mb-lg-4">Our Blog Posts</h3>

            <!-- Swiper slider -->
            <div class="row">


                <!-- Blog Post -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 3, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Technology</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">The Future of Artificial Intelligence: Trends and Innovations</a>
                            </h3>
                            <p class="card-text">Explore the latest trends and innovations in artificial intelligence that
                                are shaping the future. Discover how AI is influencing various industries and what to expect
                                in the coming years.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/10.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">Alice Bennett</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">February 18, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Business</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Strategies for Effective Remote Team Collaboration</a>
                            </h3>
                            <p class="card-text">In the era of remote work, learn effective strategies to enhance
                                collaboration within your remote team. Discover tools, communication tips, and best
                                practices for successful remote teamwork.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/07.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">John Turner</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">February 5, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Marketing</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">The Power of Content Marketing: Strategies for Success</a>
                            </h3>
                            <p class="card-text">Explore the impact of content marketing and discover effective strategies
                                to create compelling content. Learn how to engage your audience, build brand awareness, and
                                drive business growth.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/09.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">Emily Parker</h6>
                            </a>
                        </div>
                    </div>
                </article>

                  <!-- Blog Post -->
                  <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 3, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Technology</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">The Future of Artificial Intelligence: Trends and Innovations</a>
                            </h3>
                            <p class="card-text">Explore the latest trends and innovations in artificial intelligence that
                                are shaping the future. Discover how AI is influencing various industries and what to expect
                                in the coming years.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/10.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">Alice Bennett</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">February 18, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Business</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Strategies for Effective Remote Team Collaboration</a>
                            </h3>
                            <p class="card-text">In the era of remote work, learn effective strategies to enhance
                                collaboration within your remote team. Discover tools, communication tips, and best
                                practices for successful remote teamwork.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/07.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">John Turner</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">February 5, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Marketing</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">The Power of Content Marketing: Strategies for Success</a>
                            </h3>
                            <p class="card-text">Explore the impact of content marketing and discover effective strategies
                                to create compelling content. Learn how to engage your audience, build brand awareness, and
                                drive business growth.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/09.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">Emily Parker</h6>
                            </a>
                        </div>
                    </div>
                </article>

                  <!-- Blog Post -->
                  <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">March 3, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Technology</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">The Future of Artificial Intelligence: Trends and Innovations</a>
                            </h3>
                            <p class="card-text">Explore the latest trends and innovations in artificial intelligence that
                                are shaping the future. Discover how AI is influencing various industries and what to expect
                                in the coming years.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/10.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">Alice Bennett</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">February 18, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Business</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">Strategies for Effective Remote Team Collaboration</a>
                            </h3>
                            <p class="card-text">In the era of remote work, learn effective strategies to enhance
                                collaboration within your remote team. Discover tools, communication tips, and best
                                practices for successful remote teamwork.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/07.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">John Turner</h6>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Blog Post -->
                <article class="col-4 h-auto mb-3">
                    <div class="card border-0 h-100">
                        <div class="card-body pb-4">
                            <div class="d-flex align-items-center mb-4 mt-n1">
                                <span class="fs-sm text-body-secondary">February 5, 2024</span>
                                <span class="fs-xs opacity-20 mx-3">|</span>
                                <a class="badge text-nav fs-xs border" href="#">Marketing</a>
                            </div>
                            <h3 class="h4 card-title">
                                <a href="#">The Power of Content Marketing: Strategies for Success</a>
                            </h3>
                            <p class="card-text">Explore the impact of content marketing and discover effective strategies
                                to create compelling content. Learn how to engage your audience, build brand awareness, and
                                drive business growth.</p>
                        </div>
                        <div class="card-footer pt-3">
                            <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                <img class="rounded-circle" src="{{ asset('assets/web/img/avatar/09.jpg') }}" width="48"
                                    alt="Post author">
                                <h6 class="ps-3 mb-0">Emily Parker</h6>
                            </a>
                        </div>
                    </div>
                </article>




                <!-- Pagination (bullets) -->
                <div class="swiper-pagination position-relative bottom-0 mt-2 pt-4 d-lg-none"></div>
            </div>


        </div>
    </section>
@endsection
