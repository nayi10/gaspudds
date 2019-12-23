@extends('dash-master')
@section('title', 'Create New Post')

@section('content')
    <form method="POST">
        {{ csrf_field() }}
        <div class='row'>
            <div class="col-md-9">
                <div class="card mt-4">
                    <legend class="card-header text-center">Edit new article</legend>
                    <div class="card-body ml-3">
                        @include('shared.alerts')
                        
                        <div class="form-inline mb-4">
                            <div class="form-group w-100">
                                <label for="title">Post title</label>
                                <input class="form-control mx-3 w-75" type="text" value="{{ $post->title }}" name="title" id="title">
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            <div class="form-group w-100">
                                <label for="content">Decription</label>
                                <textarea class="form-control mx-3 w-75" rows="15" type="content" name="content" id="content">{{ $post->content }}</textarea>
                            </div>
                        </div>        
                        <button type="submit" class="btn btn-raised btn-primary float-right">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection