@extends('dash-master')
@section('title', "All events")

@section('content')
    <div class="row">
        <div class="col">
            @if (!$events->isEmpty())
                <div class="card">
                    <legend class="card-header text-center">All Events</legend>
                    <div class="card-body">
                        @include('shared.alerts')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Publisher</th>
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->publisher }}</td>
                                        <td>{{ date("F jS, Y", strtotime($event->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-raised btn-sm btn-primary">View</a>
                                            @can('administer site content')
                                                <a href="{{ route('events.edit', $event->slug) }}" class="btn btn-raised btn-sm btn-info">Edit</a>
                                                <form method="POST" class="m-0 d-inline">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="slug" value="{{ $event->slug }}">
                                                    <button type="submit" class='btn btn-raised btn-sm btn-danger'>Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th># of events: {{ $events->count() }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @else
                <legend class="text-center mt-5">There are no events available</legend>
                <p class="text-center">
                    <a href="{{ route('events.create') }}" class="btn btn-raised btn-primary mt-5">
                        Create an event
                    </a>
                </p>
            @endif
        </div>
    </div>
    
@endsection