@extends('dash-master')
@section('title', 'Viewing an event')

@section('content')
    <div class="row mt-3">
        <div class="col">
            @if (empty($event))
                <legend class="text-muted text-center my-2">
                    There are currently no events to display
                </legend>
                <p class="text-center mt-3"><a href="/admin/about/add" class="btn btn-raised btn-info">Create an event</a></p>

            @else
                <div class="card">
                    <legend class="card-header">
                    {{ $event->title }}
                    </legend>
                    <div class="card-body">
                        <p class="card-text">{!! nl2br($event->content) !!}</p>
                    </div>
                    <div class="card-footer">
                        <div class="px-4 mt-2">
                            <strong class="mr-3 ">
                                <span class="mdi mdi-event-seat"></span> {{ $event->publisher }}
                            </strong>
                            <strong class="mr-3">
                                <span class="mdi mdi-alarm-add"></span> Date: {{ date('M jS, Y', strtotime($event->start_date)) }} to 
                                {{ date('M jS, Y', strtotime($event->end_date)) }}
                            </strong>
                            <strong class="mr-5">
                                <span class="mdi mdi-call"></span> {{ $event->contact }}
                            </strong>
                            <span class="mdi mdi-alarm"></span> {{ date('F jS, Y', strtotime($event->created_at)) }}
                            <a href="/admin/events" class="btn btn-raised btn-info pull-right">Back</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection