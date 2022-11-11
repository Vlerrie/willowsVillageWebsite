@extends('layouts.app')

@section('content')
    @auth()
        <div class="container-fluid col-12 px-4 py-3 bg-light bg-opacity-50 mb-5 shadow" id="newsDiv">
            <div class="row g-lg-5 py-5 px-lg-5">
                <div class="col-md-4">
                    @if(count($events) == 0)
                        <h1 class="display-4 px-5 fw-bold lh-1 mb-3">No upcoming Events</h1>
                    @else
                        <h1 class="display-4 px-5 fw-bold lh-1 mb-3">Events:</h1>
                        @include('partials.eventItems')
                    @endif
                </div>
                <div class="col-md-8">
                    {{--                        <h1 class="display-4 fw-bold lh-1 mb-3">Welcome Back {{ Auth::user()->name }}</h1>--}}
                    @if(count($news) == 0)
                        <h1 class="display-4 px-5 fw-bold lh-1 mb-3">No news or updates at this time</h1>
                    @else
                        <h1 class="display-4 px-5 fw-bold lh-1 mb-3">Latest News & Updates:</h1>
                        @include('partials.newsItems')
                    @endif

                </div>
            </div>
        </div>
{{--        <div style="height: 40vh"></div>--}}
    @endauth

    <div class="container-fluid col-12 px-4 py-3 bg-light mb-5 shadow" id="willowsSecurityDiv">
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
                    <h1>## Image of closure gate locations</h1>
                @else
                    @include('auth.registerForm')
                @endauth
            </div>
        </div>
    </div>
    </div>
    <div style="height: 40vh"></div>
    <div class="container-fluid col-12 px-4 py-5 bg-light mt-5" id="wilgersDiv">
        <div class="row align-items-center g-lg-5 py-5 ps-lg-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Die Wilgers</h1>
                <p class="col-lg-10 fs-4">
                    Die Wilgers is one of the eastern suburbs of Pretoria East in Gauteng. It can be described as a
                    peaceful and well kept residential area, rich in trees and with beautiful gardens and sidewalks. The
                    presence of various shops, Die Wilgers Hospital, the Afrikaans and English High schools, two primary
                    schools, as well as the German school, in close proximity, makes Die Wilgers a very popular and
                    sought after suburb. The residents of Die Wilgers strive to maintain the special character of the
                    area, through the actions of a Residents Association, represented by an executive committee, which
                    is democratically elected at its public annual general meeting. The association represents residents
                    in the area enclosed by Rubida Street to the West, Simon Vermooten Road to the East, the N4 to the
                    North and Bronberg as the Southern border.
                </p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5 pe-lg-5" id="wilgersMap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14373.168142935181!2d28.304539589442278!3d-25.760915863014436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e955e3738401f33%3A0xcf3d42415aa4c6af!2sDie%20Wilgers%2C%20Pretoria%2C%200184!5e0!3m2!1sen!2sza!4v1668093623428!5m2!1sen!2sza" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
