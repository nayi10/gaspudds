@extends('master')
@section('title', __('footer.about_us'))

@section('content')
    <div class="container">
        @if (!empty($settings['about']))
            <h1 class="text-center" style="font-size:1.5rem;">{{ $settings['about']->title }}</h1>
            <p style="text-align:left;margin: 0 5rem;">{!! nl2br($settings['about']->content) !!}</p>
        @else
            <h2>Nothing to display</h2>
        @endif
    </div>
@endsection
