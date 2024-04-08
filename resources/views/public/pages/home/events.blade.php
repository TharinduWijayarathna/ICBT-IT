@extends('public.layouts.app')
@section('content')
    <section class="bg-primary bg-opacity-10 py-5">
        <div class="container py-sm-2 pt-md-3 py-lg-2 py-xl-4 py-xxl-5">
            <h3 class="h1 text-center pt-2 pt-sm-3 pb-3 mb-3 mb-lg-4">Our Events</h3>

            <div class="row">
                @foreach ($events as $event)
                    <article class="col-12 col-md-4 h-auto mb-3">
                        <div class="card border-0 h-100">
                            <div class="card-body pb-4">
                                <div class="d-flex align-items-center mb-4 mt-n1">
                                    <span
                                        class="fs-sm text-body-secondary">{{ date('d M Y', strtotime($event->start_date)) }}
                                        - {{ date('d M Y', strtotime($event->end_date)) }}</span>
                                </div>
                                <h3 class="h4 card-title">
                                    <a href="#">{{ $event->title }}</a>
                                </h3>
                                <p class="card-text">{{ $event->description }}
                                </p>
                            </div>
                            <div class="card-footer pt-3">
                                <a class="d-flex align-items-center text-decoration-none pb-2" href="#">
                                    <h6 class="mb-0">{{ $event->user->name ?? '' }}</h6>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </section>
@endsection
