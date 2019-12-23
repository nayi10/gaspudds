@if (!$events->isEmpty())
    <div class="card shadow-none border border-light">
        <legend class="card-header text-center">Unpublished events</legend>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Added on</th>
                        <th>Action</th>
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
                                    <form method="POST" class="m-0 d-inline" action="{{ action('Admin\EventsController@publish', $event->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="slug" value="{{ $event->slug }}">
                                        <button type="submit" class='btn btn-raised btn-sm btn-success'>Publish</button>
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
@endif