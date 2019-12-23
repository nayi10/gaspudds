@extends('master')
@section('title', "Contact us")

@section('content')
    <div class="container col-md-8 col-md-offset-2 card pt-4 pl-3">
        <div class="well well bs-component">
            <form class="form-horizontal" method="POST">
                @include('shared.alerts')
                {!! csrf_field() !!}
                <fieldset class="pl-3">
                    <legend>Contact us now</legend>
                    <div class="form-group is-focused">
                        <label for="title" class="bmd-label-floating">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content" class="bmd-label-floating">Your Message</label>
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                    </div>
                    @if (Auth::check())
                        <input type="hidden" id="username" name="username" value="{{ Auth::user()->name }}">
                    @else
                        <div class="form-group">
                            <label for="username" class="bmd-label-floating">Your name</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    @endif
                    <div class="form-group">
                        <button type="submit" class="btn btn-raised btn-primary">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
</div>
@endsection
