@extends('layout.master')
@section('content')
    <div class="card">
        <h5 class="card-header">Calendar</h5>
        <div class="card-body">
            <div class="container-fluid" id="calendar-container">
                <calendar event-route='{{url("/save/event")}}' list-event-route='{{url("/list/events")}}'></calendar>
            </div>
        </div>
    </div>
@endsection

