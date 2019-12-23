@extends('dash-master')
@section('title', 'About content')

@section('content')
    <div class="row">
        <div class="col">
            @if (empty($settings['about']))
                @can('administer site content')
                    <legend class="text-muted text-center my-2">
                        Your About page is currently empty. Write something to fill it.
                    </legend>
                    <p class="text-center mt-3"><a href="/admin/about/add" class="btn btn-raised btn-info">Add content</a></p>
                @else
                <legend class="text-muted text-center my-2">
                    The About page is currently empty.
                </legend>
                @endcan
                
            @else
                <div class="card">
                    <legend class="card-header">
                    {{ $settings['about']->title }}
                    </legend>
                    <div class="card-body">
                        <p class="card-text">{!! nl2br($settings['about']->content) !!}</p>
                    </div>
                    <div class="card-footer">
                        @can('administer site content')
                            <a href="/admin/about/edit" class="btn btn-raised btn-info">Edit</a>   
                        @endcan
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection