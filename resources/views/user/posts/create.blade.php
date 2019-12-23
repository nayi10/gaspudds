@extends('master')
@section('title', 'Create New Post')

@section('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <form method="POST">
                {{ csrf_field() }}
                <div class="card shadow-none border border-light">
                    <legend class="card-header text-center">Add new article</legend>
                    <div class="card-body ml-3">
                        @include('shared.alerts')
                        
                        <div class="form-inline mb-4">
                            <div class="form-group w-100">
                                <label for="title">Post title</label>
                                <input class="form-control mx-3 w-75" type="text" value="{{ old('title') }}" name="title" id="title">
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            <div class="form-group w-100">
                                <label for="content">Decription</label>
                                <textarea class="form-control mx-3 w-75" type="content" name="content" id="content">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary float-right">Submit article</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection