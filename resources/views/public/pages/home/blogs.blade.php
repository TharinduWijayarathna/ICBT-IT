@extends('public.layouts.app')
@section('content')
    <!-- Resources (Blog) -->
    <section class="bg-primary bg-opacity-10 py-5">
        <div class="container py-sm-2 pt-md-3 py-lg-2 py-xl-4 py-xxl-5">
            <h3 class="h1 text-center pt-2 pt-sm-3 pb-3 mb-3 mb-lg-4">Our Blog Posts</h3>

            <!-- Swiper slider -->
            <div class="row">



                @foreach ($blogs as $blog)
                    <article class="col-4 h-auto mb-3">
                        <div class="card border-0 h-100">
                            <div class="card-body pb-4">
                                <div class="d-flex align-items-center mb-4 mt-n1">
                                    <span
                                        class="fs-sm text-body-secondary">{{ date('d M Y', strtotime($blog->created_at)) }}</span>

                                </div>
                                <h3 class="h4 card-title">
                                    <a href="#">{{ $blog->title }}</a>
                                </h3>
                                <p class="card-text">{{ $blog->content }}</p>
                            </div>
                            <div class="card-footer pt-3">
                                <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                    <h6 class=" mb-0">Alice Bennett</h6>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach




                <!-- Pagination (bullets) -->
                <div class="swiper-pagination position-relative bottom-0 mt-2 pt-4 d-lg-none"></div>
            </div>


        </div>
    </section>
@endsection
