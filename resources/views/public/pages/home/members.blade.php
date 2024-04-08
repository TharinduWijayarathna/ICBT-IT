@extends('public.layouts.app')
@section('content')
    <!-- Resources (Blog) -->
    <section class="bg-primary bg-opacity-10 py-5">
        <div class="container py-sm-2 pt-md-3 py-lg-2 py-xl-4 py-xxl-5">

            <div class="container position-relative z-2 pb-3 pt-2 pt-sm-3 pt-md-4 pt-lg-5 mt-md-3 mt-xxl-2 mb-3 mb-lg-4">
                <div class="text-center mx-auto" style="max-width: 460px;">
                    <h2 class="h1">Meet Our Team</h2>
                    <svg class="d-inline-block heartbeat text-danger" width="52" height="38" viewBox="0 0 52 38"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M52,6.3c0.8-12.6-18.6-4-24.8,1.6c-0.4,0.4-1.1,0.4-1.5,0.1C9.9-2.7-2,1.5,0.3,10c1.5,5.6,16.2,20.4,25.5,27.7c0.4,0.3,1,0.3,1.4,0C36.7,29.5,51.2,19.1,52,6.3z">
                        </path>
                    </svg>
                </div>
            </div>

            <div class="row">

                @foreach ($members as $member)
                    <div class="col-md-3 col-12 mb-3">
                        <div class="card-hover text-center">

                                <img class="d-block rounded-5 mb-4 member-image"
                                    src="{{ asset('member_images/' . $member->image->name) }}" alt="Image">


                            <h3 class="h5 mb-1">{{ $member->name ?? '' }}</h3>
                            <p class="text-body-secondary mb-2">{{ $member->designation }} (B{{ $member->batch }})</p>

                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        .member-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
    </style>
@endpush
