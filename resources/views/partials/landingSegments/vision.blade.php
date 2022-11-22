<div class="row align-items-center g-lg-5 py-5 ps-lg-5">
    <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-2 fw-bold lh-1 mb-3">Willows Village</h1>
        <p class="col-lg-11 fs-4">
            Our vision is to help provide a safe community that prioritises the interest of its residents at all times.
            <br>

        </p>

        <hr class="my-5">

        <h1 class="display-5 fw-bold lh-1 mb-3">Why You Should Join</h1>
{{--        The following benefits are most likely to be achieved by the proposed scheme:--}}
{{--        <ul class="fs-4">--}}
{{--            <li>A significant reduction in crime rates</li>--}}
{{--            <li>A 10% increase in property values within the scheme</li>--}}
{{--            <li>Security, which includes alarm monitoring and armed reaction, at an affordable monthly subscription</li>--}}
{{--            <li>Significant savings on insurance premiums</li>--}}
{{--            <li>Safer streets for our children and ourselves</li>--}}
{{--            <li>Safer living and peace of mind</li>--}}
{{--        </ul>--}}
    </div>
    <div class="col-md-10 mx-auto col-lg-5 px-lg-5 align-items-top">
        @auth()
            <h1>What goes here?</h1>
        @else
            @include('auth.registerForm')
        @endauth
    </div>
</div>
