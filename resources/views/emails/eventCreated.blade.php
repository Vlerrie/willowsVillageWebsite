@extends('emails.layout.default')

@section('content')
    <h1>{{$event->title}}</h1>

    <h3>Date: {{$event->date}}</h3>
   <h3>Address:  <a href="https://www.google.com/maps/search/?api=1&query={{urlencode($event->address)}}">{{$event->address}}</a></h3>
@stop
