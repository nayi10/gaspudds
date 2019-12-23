@extends('master')

@section('title', "GASP UDS | Home")

@section('content')
    @include('shared.fragments.carousels')
    <div class="section section-about">
        @include('shared.fragments.about')
    </div>
    <div class="section section-posts">
        @include('shared.fragments.random-posts')
    </div>
    <div class="section section-executives">
        @include('shared.fragments.executives')
    </div>
    <div class="section section-events">
        @include('shared.fragments.random-events')
    </div>
    <div class="section section-gallery">
        @include('shared.fragments.gallery')
    </div>
@endsection
