@extends('dash-master')
@section('title', "".$contact->title)

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        @can('administer site content')
            @include('shared.alerts')
            @if (empty($contact))
                <p>There is nothing here to display</p>
            @else
                <div class="card">
                    <legend class="card-header">
                        {{ $contact->title }}
                    </legend>
                    <div class="card-body">
                        <p class="card-text">{!! $contact->content !!}</p>
                    </div>
                    <div class="card-footer">
                        <span class="mdi mdi-person-pin mr-2" style="font-size:1.2rem;"></span> {{ $contact->username }}
                    </div>
                    <form method="POST" class="clearfix mx-2" action="{!! action('Admin\SettingsController@deleteMessage', $contact->slug) !!}">
                        @csrf
                        <input type="hidden" name="slug" value="{!! $contact->slug !!}">
                        <button class="btn btn-raised btn-danger float-right" type="submit">
                            <span class="mdi mdi-delete-forever"></span> Delete
                        </button>
                    </form>
                </div>
            @endif
        @else
            <legend class="text-center">Nothing to display</legend>
        @endcan
    </div>
</div>
@endsection
