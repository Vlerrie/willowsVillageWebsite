@extends('emails.layout.default')

@section('content')
    <h1>{{$news->subject}}</h1>

    {!! $news->body !!}
@stop
