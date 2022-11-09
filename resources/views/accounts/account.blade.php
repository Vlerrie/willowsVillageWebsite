@extends('layouts.app')

@section('content')

    <div class="container-fluid my-5 min-vh-100">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5 p-5 bg-light rounded-3 border">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <div class="nav flex-column nav-pills w-100" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <button class="nav-link w-100" id="v-pills-account-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-account" type="button" role="tab"
                                        aria-controls="v-pills-account" aria-selected="true">Account
                                </button>
                                <button class="nav-link w-100" id="v-pills-password-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-password" type="button" role="tab"
                                        aria-controls="v-pills-password" aria-selected="false">Password
                                </button>
                                <button class="nav-link w-100" id="v-pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-contact" type="button" role="tab"
                                        aria-controls="v-pills-contact" aria-selected="false">Contact Permissions
                                </button>
                                <button class="nav-link w-100" id="v-pills-delete-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-delete" type="button" role="tab"
                                        aria-controls="v-pills-delete" aria-selected="false">Delete My Data
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 border-start py-3">
                        <div class="tab-content" id="v-pills-tabContent">
                            {{-- ACCOUNT INFO FORM --}}
                            <div class="tab-pane fade" id="v-pills-account" role="tabpanel"
                                 aria-labelledby="v-pills-password-tab" tabindex="0">
                                <form action="/account/update" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="floatingEmail"
                                               @if (isset($account->email)) disabled
                                               @endif value="{{ $account->email }}">
                                        <label for="floatingEmail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="tel" name="cell" class="form-control" id="floatingCell" disabled
                                               value="{{ $account->cell }}">
                                        <label for="floatingEmail">Mobile Number</label>
                                    </div>

                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @endif
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingName" name="name"
                                               placeholder="John" value="{{ $account->name }}">
                                        <label for="floatingName">Name</label>
                                    </div>
                                    @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @endif
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingSurname" name="surname"
                                               placeholder="Doe" value="{{ $account->surname }}">
                                        <label for="floatingSurname">Surname</label>
                                    </div>
                                    @error('field_string')
                                    <span class="text-danger">{{ $message }}</span>
                                    @endif
                                    @error('street_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @endif
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingFieldThing"
                                               name="field_string" value="{{ $account->google_address_string }}"
                                               autocomplete="do-not-autofill">
                                        <input type="hidden" id="street_number" name="street_number"
                                               value="{{ $account->street_number }}">
                                        <input type="hidden" id="route" name="route" value="{{ $account->route }}">
                                        <input type="hidden" id="sublocality" name="sublocality"
                                               value="{{ $account->sublocality }}">
                                        <input type="hidden" id="locality" name="locality"
                                               value="{{ $account->locality }}">
                                        <input type="hidden" id="postal_code" name="postal_code"
                                               value="{{ $account->postal_code }}">
                                        <label for="floatingFieldThing">Your Address</label>
                                    </div>

                                    <hr>
                                    <small class="text-muted">If you live in a complex:</small>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingComplexName"
                                               name="complex_name" placeholder="Doe"
                                               value="{{ $account->complex_name }}">
                                        <label for="floatingComplexName">Complex Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingComplexUnit"
                                               name="complex_unit" placeholder="Doe"
                                               value="{{ $account->complex_unit }}">
                                        <label for="floatingComplexUnit">Complex Unit Number</label>
                                    </div>

                                    <button class="w-100 btn btn-lg btn-success" type="submit">
                                        Update
                                    </button>
                                </form>
                            </div>
                            {{-- Password Change Form --}}
                            <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                                 aria-labelledby="v-pills-password-tab" tabindex="0">
                                <form action="/account/changePassword" method="post">
                                    @csrf
                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @endif
                                    <div class="form-floating mb-3">
                                        <input type="password" name="old_password" class="form-control"
                                               id="floatingPW1">
                                        <label for="floatingPW1">Current Password</label>
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @endif
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="floatingPW2">
                                        <label for="floatingPW2">New Password</label>
                                    </div>
                                    <button class="w-100 btn btn-lg btn-warning" type="submit">
                                        Change Password
                                    </button>
                                </form>
                            </div>
                            {{-- CONTACT PERMISSIONS --}}
                            <div class="tab-pane fade" id="v-pills-contact" role="tabpanel"
                                 aria-labelledby="v-pills-contact-tab" tabindex="0">
                                <form action="/comms/update" method="post">
                                    @csrf
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="comm_newsletter" type="checkbox"
                                               role="switch"
                                               id="flexSwitchCheckDefault"
                                               @if ($account->comm_newsletter) checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">General
                                            Newsletter</label>
                                    </div>
                                    <p class="mb-3 text-muted">
                                        This points to any general info that can be shared via email such as feedback on
                                        projects and news about Die Wilgers as a whole.
                                    </p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="comm_events" type="checkbox" role="switch"
                                               id="flexSwitchCheckChecked" @if ($account->comm_events) checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Invitations &
                                            Appointments</label>
                                    </div>
                                    <p class="mb-3 text-muted">
                                        We will send you info about community participation requirements and general
                                        events.
                                    </p>

                                    <button class="w-100 btn btn-lg btn-success" type="submit">
                                        Update
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-delete" role="tabpanel"
                                 aria-labelledby="v-pills-delete-tab" tabindex="0">
                                <p class="text-danger">
                                    Completing this action will cause a deletion of your account and data forever, it
                                    can not be undone. You can at any time register an account again.
                                </p>
                                <form method="post" action="/account/delete">
                                    @csrf
                                    <button class="w-100 btn btn-lg btn-danger" id="" type="submit">Delete All
                                        My Data
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script async
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_CLOUD_API_KEY')}}&libraries=places&callback=initMap">
    </script>

    <script>
        let acctTab = document.querySelector('#v-pills-account-tab');
        let acctPage = document.querySelector('#v-pills-account');
        let pwTab = document.querySelector('#v-pills-password-tab');
        let pwPage = document.querySelector('#v-pills-password');
        let contactTab = document.querySelector('#v-pills-contact-tab');
        let contactPage = document.querySelector('#v-pills-contact');


        @if (!session()->has('last_form'))
        acctTab.classList.add('active');
        acctPage.classList.add('active');
        acctPage.classList.add('show');
        @elseif (session('last_form') == 'pw')
        pwTab.classList.add('active');
        pwPage.classList.add('active');
        pwPage.classList.add('show');
        @elseif (session('last_form') == 'comms')
        contactTab.classList.add('active');
        contactPage.classList.add('active');
        contactPage.classList.add('show');
        @endif
    </script>

@stop
