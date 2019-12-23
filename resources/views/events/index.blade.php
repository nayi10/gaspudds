@extends('master')
@section('title', "Published events")
@section('content')
    <div class="container-fluid mx-md-3">
        <div class="row mt-5">
            @if ($events->isEmpty())
                <legend class="text-center mt-5">No events have been publihed yet</legend>
            @else
                @foreach ($events as $event)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card rounded">
                            @php
                                $img = AppHelper::getImage($event->banner);
                            @endphp
                            <img src="{{ asset("storage/$img") }}" alt="{{ $event->title }} image" class="card-img-top rounded-top" height="200px">
                            <legend class="card-header text-center" style="font-size: 1.1rem;padding:5px 0;border:0;">
                                {{ $event->title }}
                            </legend>
                            <div class="card-body pt-1 pb-2">
                                <p class="card-text">
                                    <a href="{{ route('event.details', $event->slug) }}" class="stretched-link"> 
                                        {{  substr($event->content, 0, 80) }}...
                                    </a>
                                </p>
                            </div>
                            <div class="card-footer" style="position:relative;">
                                <small class="text-xs">
                                    <span class="mdi mdi-accessible text-warning"></span> 
                                    <small>{{ substr($event->publisher, 0, 15) }}</small>
                                </small>
                                <small style="position:absolute;left:45%;" class="text-xs mx-2">
                                    <span class="mdi mdi-visibility text-info"></span> 
                                    <small>{{ $event->views }}</small>
                                </small>
                                <a class="pull-right text-xs">
                                    {{ AppHelper::formatDateToReadable($event->created_at, 'without year') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    {!! $events->links() !!}
                </div>
            @endif
        </div>
    </div>
@endsection