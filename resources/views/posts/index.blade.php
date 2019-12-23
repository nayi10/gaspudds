@extends('master')
@section('title', "Browse articles")
@section('content')
    <div class="row mt-4">
        <div class="col-lg-8 col-md-10 mx-auto">
            @if (!$posts->isEmpty())
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="{{ route('post-details', $post->slug) }}">
                            <h1 class="post-title">{{ $post->title }}</h1>
                            <p>{{ substr($post->content, 0, 350) }}...</p>
                        </a>
                        <small class="post-meta">Posted by
                            <a href="#">{{ str_replace(array('[',']','"'),'', AppHelper::getStudentName($post->author)->pluck('name')) }}</a>
                            on {{ date('F jS, Y', strtotime($post->created_at)) }} | 
                            <span class="text-success">Viewed {{ $post->views }} times</span>
                        </small>
                    </div>
                    <hr>
                @endforeach
                <div class="justify-content-center">
                    {!! $posts->links() !!}
                </div>
            @else
                <legend class="text-center">There exists no articles at the moment</legend>
            @endif
        </div>
    </div>
@endsection