<div class="row align-items-center g-lg-5 py-5 ps-lg-5">
    <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Willows Village</h1>
        <p class="col-lg-11 fs-4">
            Joining is free and gives every resident a voice.
            <br><br>
            By joining, you will be added to a mailing list and will receive general updates, that affect the
            area and its people. You will be able to unsubscribe from this feature, should you prefer not to be
            included on these emails.
            <br><br>
            With the help and guidance of a consultant, with considerable experience in the field of community
            enclosures, we as the Willows Village task team, are beyond excited, to announce that it IS
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
