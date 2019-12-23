@extends('dash-master')
@section('title', 'Add email address')

@section('content')
    <div class="row">
        <div class="col-md-11">
            @can('administer site content')
                <div class="card">
                    <h4 class="card-header">{{ __('New email address for receiving emails from members') }}</h4>

                    <div class="card-body">
                        @include('shared.alerts')
                        <form method="POST">
                            @if (!isset($settings['mail']))
                                {{ $email = $settings['mail']->email }}
                            @else
                                {{ $email = '' }}
                            @endif
                            @csrf
                            <input type="hidden" name="type" value="mail">
                            <label for="email">{{ __('Email address') }}</label>
                            <input id="email" class="form-control" name="email" value="{{ $email }}" autofocus>
                            <br>
                            <div class="float-right">
                                <button class="btn btn-raised btn-warning mt-3 btn-reset" type="reset">Reset</button>
                                <button class="btn btn-raised btn-primary mt-3" type="submit">Save Content</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <legend class="text-center mt-5">You have no permission to add/edit the site's email</legend>
            @endcan
        </div>
    </div>
@endsection