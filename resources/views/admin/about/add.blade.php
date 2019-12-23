@extends('dash-master')

@section('title', 'Add About Us content');
@section('content')
    <div class="row">
        <div class="col-md-10 mt-md-4">
            <div class="card">
                <h4 class="card-header">{{ __('Add About Us content') }}</h4>

                <div class="card-body clearfix">
                    @include('shared.alerts')
                    <form method="POST">
                        @csrf
                        <label for="title">{{ __('Title') }}</label>
                        <input id="title" class="form-control" name="title" value="{{ old('title') }}" autofocus>
                        <br>

                        <label for="content">{{ __('Content') }}</label>
                        <textarea id="content" class="form-control" name="content">{{ old('content') }}</textarea>
                        
                        <button class="btn btn-raised btn-primary float-right mt-2" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection