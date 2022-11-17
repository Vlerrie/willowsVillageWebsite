@extends('layouts.app')

@section('content')
    @auth()
        <div class="container-fluid col-12 px-4 py-3 bg-light bg-opacity-50 shadow" id="newsDiv">
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

    <div class="container-fluid col-12 px-4 py-3 bg-light shadow" id="willowsSecurityDiv">
        <div class="row align-items-center g-lg-5 py-5 ps-lg-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Willows Security Village</h1>
                <p class="col-lg-11 fs-4">
                    Joining is free and gives every resident a voice.
                    <br><br>
                    By joining, you will be added to a mailing list and will receive general updates, that affect the
                    area and its people. You will be able to unsubscribe from this feature, should you prefer not to be
                    included on these emails.
                    <br><br>
                    With the help and guidance of a consultant, with considerable experience in the field of community
                    enclosures, we as the Willows Security Village task team, are beyond excited, to announce that it IS
                    possible and extremely important, to start with the process to close down our area to safeguard our
                    residents. We will, however, need an absolute unified front and total support of the community, to
                    drive this project to completion. NEED MORE INFO & DETAIL
                    <br><br>
                    We strive towards a unified and strong community, that will look out to improve the safety and
                    well-being of our people and our suburb. So we urge each and everyone to help us, by joining this
                    site and being an active member of our community
                </p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5 px-lg-5 align-items-top">
                @auth()
                    <h1>What goes here?</h1>
                @else
                    @include('auth.registerForm')
                @endauth
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid px-4 py-5 bg-wvgreen" id="benefitsDiv">
        <h1 class="display-4 fw-bold lh-1 mb-3 text-center text-white">Benefits</h1>
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg feature-back" id="valueFeature">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Increased Property Value</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center">
                                    <small>Up To 10% Increase</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg feature-back" id="safetyFeature">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Safety For Your Family</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center">
                                    <small></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg feature-back" id="safetyFeature">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Some more benefits?</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center">
                                    <small></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid col-12 px-4 py-5 bg-light" style="min-height: 75vh" id="closureDiv">
        <div class="row align-items-center g-lg-5 py-5 ps-lg-5">
            <div class="col-lg-5 text-center text-lg-start">
                <h1>## Image of closure gate locations</h1>
            </div>
            <div class="col-md-10 mx-auto col-lg-7 pe-lg-5" id="wilgersMap">

                <h1 class="display-4 fw-bold lh-1 mb-3">The Closure Process</h1>
                <p class="col-lg-10 fs-4">
                    Wording to Be finalized
                </p>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid px-4 py-3 bg-secondary shadow" id="services"> --}}
    {{-- @include('partials.services') --}}
    {{-- </div> --}}
    {{--    <div style="height: 40vh"></div>--}}
    {{--    @auth() --}}
    {{--    <div class="container-fluid px-4 py-5 bg-light mt-5" id="supportUs">--}}
    {{--        @include('partials.support')--}}
    {{--    </div>--}}
    {{--    @endauth --}}
@stop
