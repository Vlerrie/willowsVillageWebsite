@extends('layouts.app')

@section('content')
    @auth()
        <div class="container-fluid col-12 px-4 py-3 bg-light bg-opacity-50 shadow-lg">
            <span id="newsDiv" style="position:relative; top: -150px"></span>
            @if(!Auth::user()->email_verified_at && isset(Auth::user()->email))
                <div class="row justify-content-center g-lg-5 py-5 px-lg-5">
                    <div class="col-md-4 bg-light p-5 rounded-3">
                        <h3 class="h3 text-center">
                            Please Verify Your Email
                        </h3>
                        <small>It may take a few minutes for the email to show up in your inbox.</small>
                        <h4 class="h6 text-center">
                            Or Resend The Email By Clicking The Button Below
                        </h4>
                        <button class="btn btn-lg w-100 btn-outline-secondary mt-3"
                                onclick="window.location.href='/email/verification-notification'">
                            Resend Email Verification
                        </button>
                        <br>
                    </div>
                </div>
            @else
                <div class="row g-lg-5 py-5 px-lg-5 overflow-auto" style="max-height: 700px">
                    <div class="col-md-4">
                        @if(count($events) == 0)
                            <h1 class="h1 fw-bold lh-1 mb-3">No Events</h1>
                        @else
                            <h1 class="h1 fw-bold lh-1 mb-3">Upcoming Events:</h1>
                            @include('partials.eventItems')
                        @endif
                    </div>
                    <div class="col-md-8">
                        {{--                        <h1 class="display-4 fw-bold lh-1 mb-3">Welcome Back {{ Auth::user()->name }}</h1>--}}
                        @if(count($news) == 0)
                            <h1 class="h1 fw-bold lh-1 mb-3">No News</h1>
                        @else
                            <h1 class="h1 fw-bold lh-1 mb-3">Latest News</h1>
                            @include('partials.newsItems')
                        @endif

                    </div>
                </div>
            @endif
        </div>
    @endauth

    <div class="container-fluid col-12 px-4 py-3 bg-light shadow-lg" id="willowsSecurityDiv">
        @include('partials.landingSegments.vision')
    </div>

    <div class="container-fluid px-4 py-5">
        <span id="benefitsDiv" style="position:relative; top: -150px"></span>
        @include('partials.landingSegments.benefits')
    </div>

    <div class="container-fluid col-12 px-4 py-5 bg-light shadow-above" style="min-height: 75vh">
        <span id="closureDiv" style="position:relative; top: -150px"></span>
        @include('partials.landingSegments.closureProcess')
    </div>
@stop
