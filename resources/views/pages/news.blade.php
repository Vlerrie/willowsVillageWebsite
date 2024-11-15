@extends('layouts.app')

@section('title')
    Die Wilgers Area
@endsection


@section('metaDescription')
    <meta name="description" content="More general information about die wilgers and surrounding points of interests">
@endsection

@section('content')
    @php
        $newsCount = count($news);
        $eventCount = count($events);

        $newsCol = 'col-md-10';
        $eventCol = 'col-md-6';

        if ($newsCount > 0 && $eventCount > 0){
            $newsCol = 'col-md-8';
            $eventCol = 'col-md-4';
        }

    @endphp
    <div class="container-fluid col-12 px-4 py-3 bg-light bg-opacity-50 shadow-lg">
        <div class="row g-lg-5 py-5 px-lg-5 justify-content-center" style="min-height:80vh">
            @if($newsCount > 0 || $eventCount > 0)
                @if($eventCount > 0)
                    <div class="{{$eventCol}}">
                            <h1 class="h1 fw-bold lh-1 mb-3">Upcoming Events</h1>
                            @include('partials.eventItems')
                    </div>
                @endif
                @if($newsCount > 0)
                    <div class="{{$newsCol}}">
                            <h1 class="h1 fw-bold lh-1 mb-3">Latest News</h1>
                            @include('partials.newsItems')
                    </div>
                @endif
            @else
                <h1 class="h1 fw-bold lh-1 mb-3">No News or Events Yet, Check back later to see what has been going on with
                    the project.</h1>
            @endif
        </div>
    </div>

@endsection
