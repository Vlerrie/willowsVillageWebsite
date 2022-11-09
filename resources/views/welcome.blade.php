@extends('layouts.app')

@section('content')

    <div class="container-fluid m-0 py-4 default-gradient" id="welcome">
        <div class="row justify-content-center py-4">
            <div class="col-md-4 bg-dark">
            </div>
        </div>
    </div>

    @auth()
        <div class="container-fluid col-12 px-4 py-3 bg-light mb-5 shadow">
            <div class="row align-items-center justify-content-center g-lg-5 py-5 ps-lg-5">
                {{--                <div class="col-lg-4 text-center text-lg-start">--}}
                {{--                    <h1 class="display-4 fw-bold lh-1 mb-3">Welcome Back {{ Auth::user()->name }}, check out the latest updates <i class="fa fa-arrow-right"></i></h1>--}}
                {{--                </div>--}}
                <div class="col-md-12 mx-auto">
                    @if(count($news) == 0)
                        <h1 class="display-4 px-5 fw-bold lh-1 mb-3">Welcome back {{ Auth::user()->name }}, we don't
                            have any news or updates to share at this time.</h1>
                    @endif

                </div>
            </div>
        </div>
    @endauth

    <div class="container-fluid col-12 px-4 py-3 bg-light mb-5 shadow">
        <div class="row align-items-center g-lg-5 py-5 ps-lg-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Willows Security Village</h1>
                <p class="col-lg-10 fs-4">Joining is free and gives every resident a voice.<br><br>
                    By joining you will be added to a mailing list and will receive general updates that affects the
                    area and its people.
                    You will be able to unsubscribe from this feature should you not want to be included on these
                    emails.<br><br>
                    With the help and guidance of a consultant with conciderable experience in the field of
                    community
                    enclosures we as the willows security village task team are beyond excited to announce that it
                    IS
                    possible to start with closing down our community.

                    We will need an absolute unified front and total support of the community to drive this project
                    to completion. *NEED MORE INFO & DETAIL*

                    {{-- AGM details will also be posted here and sent via email.
                    In the future we also plan to use this platform to allow for an easy way of giving
                    recommendations and voting on important matters. --}}
                    <br><br>
                    We hope to build a unified and strong community that looks out for our suburb and its peoples,
                    help us by joining and being an active member!
                </p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5 pe-lg-5">
                @auth()
                    <ul class="list-group shadow">
                        @foreach($news as $n)
                            <li class="list-group-item border-start-0 border-end-0 py-3">
                                <div class="row">
                                    <div class="col-3 border-end">
                                        <h2 class="h2">
                                            {{$n->subject}}
                                        </h2>
                                        <small>{{$n->created_at}}</small>
                                    </div>
                                    <div class="col-9 ps-3">
                                        @auth()
                                            @if(Auth::user()->admin)
                                                <button class="btn btn-outline-danger border-0 float-end"
                                                        style="position: relative; right: 0px">
                                                    <i class="fa fa-trash-can"></i>
                                                </button>
                                            @endif
                                        @endif

                                        {!! $n->body !!}
                                    </div>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                @elseauth()
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
                <p class="col-lg-10 fs-4"> Die Wilgers is one of the eastern suburb of Pretoria, Gauteng.
                    It can be described as a safe residential area, rich in trees and with beautiful gardens and
                    sidewalks.
                    The presence of an Afrikaans and English high school in the area, and two primary schools
                    nearby, as
                    well as the German school in close proximity, makes Die Wilgers a sought after suburb.
                    The residents of Die Wilgers strive to maintain the special character of the area through the
                    actions of a Residents Association represented by an executive committee which is democratically
                    elected at its public annual general meeting.
                    The association represents residents in the area enclosed by Rubida Street to the West, Simon
                    Vermooten Road to the East, the N4 to the North and Bronberg as the Southern border.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5 pe-lg-5" id="wilgersMap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10163.32787900159!2d28.312517724046224!3d-25.76134554777729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e955e3738401f33%3A0xcf3d42415aa4c6af!2sDie%20Wilgers%2C%20Pretoria%2C%200184!5e0!3m2!1sen!2sza!4v1666022853065!5m2!1sen!2sza"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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
