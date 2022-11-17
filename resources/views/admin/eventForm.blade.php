<div class="row">
    <div class="col-md-5 border-end">
        <form action="/admin/event/create" method="post">
            @csrf
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingTitle" name="title"
                       placeholder="Title">
                <label for="floatingTitle">Title</label>
            </div>

            @error('location')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('field_string')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('street_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingFieldThing"
                       name="field_string"
                       autocomplete="do-not-autofill" placeholder="Event Address">
                <input type="hidden" id="street_number" name="street_number">
                <input type="hidden" id="route" name="route">
                <input type="hidden" id="sublocality" name="sublocality">
                <input type="hidden" id="locality" name="locality">
                <input type="hidden" id="postal_code" name="postal_code">
                <label for="floatingFieldThing">Event Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingDate" name="date"
                       placeholder="Title">
                <label for="floatingDate">Date</label>
            </div>
            <div class="form-floating mb-3">
                <input type="time" class="form-control" id="floatingTime" name="time"
                       placeholder="Title">
                <label for="floatingTime">Time</label>
            </div>
            <button class="btn w-100 btn-outline-success">Create Event</button>
        </form>
    </div>

    <div class="col-md-7">
        @include('admin.eventItems')
    </div>
</div>


<script async
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_CLOUD_API_KEY')}}&libraries=places&callback=initMapFull">
</script>
