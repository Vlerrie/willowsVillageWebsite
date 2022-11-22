@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="row justify-content-center m-0 my-5 vh-100">
        <div class="col-sm-12 col-md-6 col-lg-4">

            <form class="p-4 p-md-5 border rounded-3 bg-light shadow" method="post" action="/login">
                <div class="row justify-content-center mb-5">
                    <div class="col-10">
                        @include('layouts.logo')
                    </div>
                </div>
                @csrf
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @endif
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingEmail" name="email"
                            placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingEmail">
                            <i class="fa-solid fa-envelope"></i>
                            Email address or Mobile Number
                        </label>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @endif
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password"
                                placeholder="Password">
                            <label for="floatingPassword">
                                <i class="fa-solid fa-lock"></i>
                                Password
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-success" type="submit" onclick="setTimeout(() => this.setAttribute('disabled', true), 20);">
                            Sign In
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </button>
                        <hr class="my-4">
                        <small class="text-muted">By clicking Sign in, you agree to the terms of use.</small><br>
                        <small class="text-muted">Don't have an account? <a href="/register">register here</a></small>
                    </form>
                </div>
            </div>

        @stop
