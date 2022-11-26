<div class="row align-items-center g-lg-5 py-5 ps-lg-5">
    <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-2 fw-bold lh-1 mb-3">Willows Village</h1>
        <p class="col-lg-11 fs-3">
            Over recent years most of the areas bordering ours have created security perimeters around themselves. We
            believe that it could be a cause for our crime rates spiking.
            By closing down the willows area with a security perimeter including booms, cameras and guards we believe
            that our vision to help provide a safe community that prioritises the interest of its residents at all times
            could become a reality.

        </p>

        @guest()
{{--            <hr class="my-5">--}}

            <h1 class="display-5 fw-bold lh-1 mb-3 mt-5">Consider Joining</h1>
            <p class="fs-3">
                Together our community can create a safe environment for all residents.
            </p>
            <p class="fs-3">
                Frequent communication will keep you updated with what is going on in our area.
            </p>
            <p class="fs-3">
                Receive updates on the progress of the area closure as it progresses.
            </p>
            {{--        The following benefits are most likely to be achieved by the proposed scheme:--}}
            {{--        <ul class="fs-4">--}}
            {{--            <li>A significant reduction in crime rates</li>--}}
            {{--            <li>A 10% increase in property values within the scheme</li>--}}
            {{--            <li>Security, which includes alarm monitoring and armed reaction, at an affordable monthly subscription</li>--}}
            {{--            <li>Significant savings on insurance premiums</li>--}}
            {{--            <li>Safer streets for our children and ourselves</li>--}}
            {{--            <li>Safer living and peace of mind</li>--}}
            {{--        </ul>--}}
        @endguest
    </div>
    <div class="col-md-10 mx-auto col-lg-5 px-lg-5 align-items-top">
        @auth()
            @if(count($events) > 0)
                <h1 class="h1 fw-bold lh-1 mb-3">Upcoming Events:</h1>
                @include('partials.eventItems')
            @endif
        @else
            @include('auth.registerForm')
        @endauth
    </div>
</div>
