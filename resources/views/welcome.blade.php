@extends('layouts.app')

@section('title')
    Home
@endsection

@section('metaDescription')
    <meta name="description" content="Make the Willows a safer area by closing the community">
@endsection

@section('content')

    <div class="container-fluid col-12 px-4 py-3 bg-light shadow-lg" id="willowsSecurityDiv">
        @include('partials.landingSegments.vision')
    </div>

    <div class="container-fluid px-4 py-5">
        <span id="benefitsDiv" style="position:relative; top: -150px"></span>
        @include('partials.landingSegments.benefits')
    </div>

    <div class="container-fluid col-12 px-4 py-5 bg-light shadow-above" style="min-height: 75vh">
        <span id="closureDiv" style="position:relative; top: -150px"></span>
        @include('partials.landingSegments.closureProcess')
    </div>
@stop
