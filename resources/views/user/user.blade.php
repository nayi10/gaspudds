@extends('master')
@section('title', "Your dashboard | ".Auth::user()->name)

@section('content')
    <div class="row">
        @include('shared.user-sidebar')
        <div class="col">
            <div class="card shadow-none border border-light">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
        </div>
    </div>
    
@endsection