@extends('layout.master')
@section('content')
<div class="container-fluid" id="calendar-container">
    <calendar event-route='{{url("/save/event")}}' list-event-route='{{url("/list/events")}}'></calendar>
</div>
@endsection