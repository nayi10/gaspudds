@extends('master')
@section('title', __("Event | ".$event->title))

@section('content')
    <div class="row mt-3">
        @if (!empty($event))
            @php
                $img = AppHelper::getImage($event->banner);
            @endphp
            <div class="col-md-8">
                <h1 class="text-md text-center">{{ ucwords($event->title) }}</h1>
                <div class="card shadow-none border border-light p-3">
                    <p class="card-body">{!! nl2br($event->content) !!}</p>
                    <div class="card-footer">
                        <p>Published by <strong class="text-success">{{ $event->publisher }}</strong>, 
                            <strong>{{ AppHelper::formatDateToReadable($event->created_at) }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h1 class="text-md text-center">Event meta</h1>
                <div class="card shadow-none border border-light">
                    <a href="{{ asset("storage/$img") }}" data-lightbox="event-image" data-title="{{ $event->title }}">
                        <img src="{{ asset("storage/$img") }}" class="card-img-top rounded-top"  alt="{{ $event->title }} image">
                    </a>
                    <legend class="card-header text-sm px-3 my-2">
                        <small>Venue</small> <small class="float-right">{{ $event->venue }}</small>
                    </legend>
                    <div class="card-body">
                        <p><strong class="mr-2">Date:</strong>{{ AppHelper::formatDateToReadable($event->start_date) }} to 
                            {{ AppHelper::formatDateToReadable($event->end_date) }}
                        </p>
                        <p>
                            <strong><span class="mdi mdi-call"></span> Organizer's contact:</strong> 
                            <span class="float-right">{{ $event->contact }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @else
            <legend class="text-muted text-center my-2">
                Nothing found
            </legend>
            <p class="text-center mt-3">
                There is nothing here to display. Are you sure you're not lost? Here are links to help:<br>
                <br><a href="/">Homepage</a><br>
                <br><a href="/events">Events</a>
            </p>
        @endif
    </div>
@endsection