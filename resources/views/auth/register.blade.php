@extends('layouts.app')

@section('content')
    <div class="my-5"></div>
    <div class="container-fluid">
        <div class="row justify-content-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                @include('auth.registerForm')
            </div>
        </div>
    </div>

@stop
