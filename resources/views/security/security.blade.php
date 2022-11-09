@extends('layouts.app')

@section('content')

    <div class="container-fluid mb-5 mt-0" id="village">
        <div class="row justify-content-center mt-0">
            <div class="col-md-12 p-5 bg-light mt-0">
                @include('security.securityVillage')
            </div>
        </div>
    </div>
    <br><br><br><br>
    <div class="container-fluid my-5" id="cameras">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12 p-5 bg-light mt-5">
                @include('security.cameraProject')
            </div>
        </div>
    </div>
    <br><br><br><br>
    <div class="container-fluid mt-5 mb-0" id="enclosure">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12 p-5 bg-light mt-5">
                @include('security.enclosureProject')
            </div>
        </div>
    </div>

    @stop
