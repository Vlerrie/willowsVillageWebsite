@extends('layouts.app')

@section('title')
    Die Wilgers Area
@endsection


@section('metaDescription')
    <meta name="description" content="More general information about die wilgers and surrounding points of interests">
@endsection

@section('content')

    <div class="container-fluid col-12 px-4 py-3 bg-light bg-opacity-50 shadow-lg">
        <div class="row g-lg-5 py-5 px-lg-5 justify-content-center" style="min-height:80vh">
            <div class="col-md-10">
                {{--                        <h1 class="display-4 fw-bold lh-1 mb-3">Welcome Back {{ Auth::user()->name }}</h1>--}}
                @if(count($news) == 0)
                    <h1 class="h1 fw-bold lh-1 mb-3">No News Yet, Check back later to see what has been going on with
                        the project.</h1>
                @else
                    <h1 class="h1 fw-bold lh-1 mb-3">Latest News</h1>
                    @include('partials.newsItems')
                @endif

            </div>
        </div>
    </div>

@endsection
