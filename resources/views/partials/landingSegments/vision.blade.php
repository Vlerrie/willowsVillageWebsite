<div class="row g-lg-5 py-5 ps-lg-5">
    <div class="col-lg-6 text-center text-lg-start">
        <h1 class="display-2 fw-bold lh-1 mb-3">Willows Village</h1>
        <p class="col-lg-11 fs-3">
            Over recent years most of the areas bordering ours have created security perimeters around themselves. We
            believe that it could be a cause for our crime rates spiking.
            By closing down the Willows area with a security perimeter including booms, cameras and guards we believe
            that our vision to help provide a safe community that prioritises the interest of its residents at all times
            could become a reality.
        </p>

        <h1 class="display-3 fw-bold lh-1 mb-2 mt-4">Vision & Goal</h1>
        <p class="col-lg-11 fs-3">
            Our vision is to establish an Independent Community Forum dedicated to enhancing and promoting the safety of
            our neighborhood and every resident.
            <br>
            The goal is to within 24 months, assess the feasibility of implementing Closure/Boom off The Willows and
            execute the project if it aligns with the best interests of all residents.
        </p>


    </div>
    <div class="col-md-10 col-lg-6">
        <h1 class="display-2 fw-bold lh-1 mb-3">Proposed Map</h1>
        <iframe title="Willows Village"
                src="https://www.google.com/maps/d/u/0/embed?mid=1K2LEYUBv7pdVAZZCkc9xsbM7YVZaMtw&ehbc=2E312F&noprof=1"
                loading="lazy" width="100%" style="height: 60vh"></iframe>
        @if(count($events) > 0)
            <h1 class="h1 fw-bold lh-1 mb-3">Upcoming Events:</h1>
            @include('partials.eventItems')
        @endif
    </div>
</div>
