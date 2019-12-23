@extends('dash-master')
@section('title', "All contacts")
@section('content')
<div class="row">
    @can('administer site content')
        <div class="col">
            <legend class="text-center"> Messages from Members </legend>
            @if ($contacts->isEmpty())
                <p class="text-center">There are no messages to display</p>
            @else
                <div class="card">
                    @include('shared.alerts')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{!! $contact->username !!}</td>
                                    <td>{!! $contact->title !!}</td>
                                    <td>{{ substr($contact->content, 0, 50) }}...</td>
                                    <td colspan="2">
                                        <form method="POST" action="{!! action('Admin\SettingsController@deleteMessage', $contact->slug) !!}">
                                            <a class="btn btn-info btn-sm mr-2" href="{!! action('Admin\SettingsController@showMessage', $contact->slug) !!}">
                                                <span class="mdi mdi-visibility"></span>
                                            </a>
                                            @csrf
                                            <input type="hidden" name="slug" value="{!! $contact->slug !!}">
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <span class="mdi mdi-delete-forever"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @else
            <legend class="text-center mt-4">Not enough permissions</legend>
        @endcan
    </div>
</div>
@endsection
