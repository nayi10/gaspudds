@extends('dash-master')

@section('title', 'Edit about content');
@section('content')
    <div class="row">
        <div class="col-md-10 mt-md-4">
            <div class="card">
                <h4 class="card-header">{{ __('Edit about content') }}</h4>

                <div class="card-body">
                    @include('shared.alerts')
                    <form method="POST">
                        @csrf
                        <label for="title">{{ __('Title') }}</label>
                        <input id="title" class="form-control" name="title" value="{{ $settings['about']->title }}" autofocus>
                        <br>

                        <label for="content">{{ __('Content') }}</label>
                        <textarea id="content" type="content" class="form-control" name="content">
                            {{ $settings['about']->content }}
                        </textarea>
                        <div class="float-right">
                            <button class="btn btn-raised btn-warning mt-3 btn-reset" type="reset">Reset</button>
                            <button class="btn btn-raised btn-primary mt-3" type="submit">Update Content</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection