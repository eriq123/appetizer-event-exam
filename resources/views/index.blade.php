@extends('layout.master')
@section('content')
    <div class="card">
        <h5 class="card-header">Calendar</h5>
        <div class="card-body">
            <div class="container-fluid" id="calendar-container">
                <!-- insert a parent component here -->
                <calendar event-route='{{url("/save/event")}}'></calendar>
            </div>
        </div>
    </div>
@endsection

