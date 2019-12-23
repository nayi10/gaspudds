@extends('master')
@section('title', 'Edit Post')

@section('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <form method="POST">
                {{ csrf_field() }}
                <div class="card shadow-none border border-light">
                    <legend class="card-header text-center">Edit article</legend>
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
            </form>
            </div>
        </div>
@endsection