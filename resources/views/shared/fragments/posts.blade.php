@can('administer site content')
    @if (!$posts->isEmpty())
        <div class="card shadow-none border border-light">
            <legend class="card-header text-center">Articles pending approval</legend>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ date("F jS, Y", strtotime($post->created_at)) }}</td>
                                <td>
                                    <form method="POST" class="m-0 d-inline" action="{{ route('post.approve', $post->slug) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="slug" value="{{ $post->slug }}">
                                        <button type="submit" class='btn btn-raised btn-sm btn-warning'>Approve post</button>
                                    </form>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-raised btn-sm btn-primary" data-toggle="modal" data-target="#modal{{ $post->id }}">
                                        View
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitle{{ $post->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom">
                                            <h5 class="modal-title" id="modalTitle{{ $post->id }}">{{ $post->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body border-bottom">
                                                {!! nl2br($post->content) !!}
                                            </div>
                                            <div class="px-4 mt-2">
                                                <span class="mr-3 ">
                                                    <span class="mdi mdi-person"></span> {{ $post->author }}
                                                </span>
                                                <span class="mdi mdi-alarm"></span> {{ date('F jS, Y', strtotime($post->created_at)) }}
                                                <button type="button" class="btn btn-raised btn-info pull-right" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th># of posts: {{ $posts->count() }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endif
@endcan