@extends('master')
@section('title', __("Article - ".$post->title))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            @isset($post)
                <h1 class="text-md">{{ $post->title }}</h1>
                <!-- Author -->
                <small class="post-meta">
                    Posted by
                    <a href="#">
                        {{ str_replace(array('[',']','"'),'', 
                        AppHelper::getStudentName($post->author)->pluck('name')) }}
                    </a> on {{ date('F jS, Y', strtotime($post->created_at)) }}
                </small>
                <hr>
                <p>{!! nl2br($post->content) !!}</p>
            @else
                <legend class="text-center">No posts are available at the moment</legend>
            @endisset
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Side Widget -->
            <div class="card my-4 shadow-none border">
                <h5 class="card-header text-center">About author</h5>
                @php
                    $author = AppHelper::getStudent($post->author)
                @endphp
                <div class="card-body">
                    <h2 class="text-sm text-center">
                        <img src="{{ asset(AppHelper::getUserProfileImage($author->student_id)) }}" class="img-sm mr-3 rounded-circle">
                         {{ $author->name }}
                    </h2>
                    @isset($author->about)
                        <p>
                            {{ $author->about }}
                        </p>
                    @else
                        <div class="d-flex justify-content-center my-5">
                            <p title="This author has no story to display"><span class="mdi mdi-face text-primary mdi-4x"></span></p>
                        </div>
                    @endisset
                </div>

            </div>
            <div class="card my-4 py-0 mx-0 shadow-none border">
                <h5 class="card-header">Most viewed articles</h5>
                <div class="card-body m-0 p-0">
                    <div class="list-group list-group-flush py-0">
                        @foreach ($similar as $mostViewed)
                            <a href="{{ route('post-details', $mostViewed->slug) }}" class="list-group-item list-group-item-action border-bottom">
                                <div class="d-flex w-100 justify-content-between mb-1">
                                    <h5 class="mb-1 text-xs font-weight-bold">{{ $mostViewed->title }}</h5>
                                </div>
                                <p>{{ substr($mostViewed->content, 0, 50) }}...</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection