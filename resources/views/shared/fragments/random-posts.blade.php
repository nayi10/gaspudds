@if (!$posts->isEmpty())
    <h2 class="text-md text-center mb-4">Recent Articles</h2>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6 mb-3">
                <div class="post-preview">
                    <a href="{{ route('post-details', $post->slug) }}">
                        <h1 class="post-title">{{ $post->title }}</h1>
                        <p>{{ substr($post->content, 0, 350) }}...</p>
                    </a>
                    <small class="post-meta">Posted 
                        on {{ date('F jS, Y', strtotime($post->created_at)) }} | 
                        <span class="text-success">{{ $post->views }} views</span>
                    </small>
                </div>
            </div>
        @endforeach
        <div class="col">
            <a href="{{ route('posts') }}" class="btn btn-primary btn-raised pull-right">
                Browse more articles <span class="mdi mdi-navigate-next"></span>
            </a>
        </div>
    </div>
@endif