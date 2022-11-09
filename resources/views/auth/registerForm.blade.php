<form class="p-4 p-md-5 border rounded-3 bg-light shadow" onsubmit="return validateRegister()" method="post" action="/register">
    <div class="row justify-content-center mb-5">
        <div class="col-10">
            @include('layouts.logo')
        </div>
    </div>

    @csrf

    @error('name')
        <span class="text-danger">{{ $message }}</span>
        @endif
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingName" name="name" placeholder="John"
                value="{{ old('name') }}">
            <label for="floatingName">
                <i class="fa-solid fa-user"></i>
                Name
            </label>
        </div>
        @error('surname')
            <span class="text-danger">{{ $message }}</span>
            @endif
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingSurname" name="surname" placeholder="Doe"
                    value="{{ old('surname') }}">
                <label for="floatingSurname">
                    <i class="fa-solid fa-user"></i>
                    Surname
                </label>
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
                @endif
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com"
                        value="{{ old('email') }}">
                    <label for="floatingEmail">
                        <i class="fa-solid fa-envelope"></i>
                        Email address
                    </label>
                </div>
                @error('cell')
                    <span class="text-danger">{{ $message }}</span>
                    @endif
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="floatingCell" name="cell" placeholder="+27123123123"
                            value="{{ old('cell') }}">
                        <label for="floatingCell">
                            <i class="fa-solid fa-mobile"></i>
                            Mobile Number
                        </label>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @endif
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                            <label for="floatingPassword">
                                <i class="fa-solid fa-lock"></i>
                                Password
                            </label>
                        </div>
                        @error('field_string')
                            <span class="text-danger">{{ $message }}</span>
                            @endif
                            @error('street_number')
                                <span class="text-danger">{{ $message }}</span>
                                @endif
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingFieldThing" name="field_string"
                                        autocomplete="do-not-autofill">
                                    <input type="hidden" id="street_number" name="street_number">
                                    <input type="hidden" id="route" name="route">
                                    <input type="hidden" id="sublocality" name="sublocality">
                                    <input type="hidden" id="locality" name="locality">
                                    <input type="hidden" id="postal_code" name="postal_code">
                                    <label for="floatingFieldThing">
                                        <i class="fa-solid fa-location-pin"></i>
                                        Your Street Address
                                    </label>
                                </div>
                                <button class="w-100 btn btn-lg btn-success" id="registerButton" type="submit">
                                    Sign up
                                    <i class="fa-solid fa-clipboard-list ms-2"></i>
                                </button>
                                <hr class="my-4">
                                <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small><br>
                                <small class="text-muted">Already have an account? <a href="/login">login here</a></small>
                            </form>

                            <script async
                                src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_CLOUD_API_KEY')}}&libraries=places&callback=initMap">
                            </script>
