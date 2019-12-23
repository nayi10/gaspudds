@extends('master')

@section('title', "GASP UDS | Gallery")

@section('content')
<h1 class="text-center mt-4">Explore our uploaded galleries</h1>
    <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with buttons">
        <div class="btn-group mr-2" role="group">
            <a href="{{ route('gallery') }}" class="btn btn-raised btn-primary" style="text-transform:capitalize;">
                All
            </a>
            @if (!$categories->isEmpty())
                @foreach ($categories as $category)
                    <a href="{{ route('gallery.category', $category->category) }}" class="btn btn-raised btn-primary" style="text-transform:capitalize;">
                        {{ $category->category }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
    @if (!$images->isEmpty())
        <div class="row mx-md-4">
            @foreach ($images as $image)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <a href="{{ asset("storage/$image->image_url") }}" data-lightbox="image-{{ $image->id }}" data-title="{{ $image->image_name }}">
                        <img class="card-img gallery" src="{{ asset("storage/$image->image_url") }}" alt="{{ $image->image_name }}"/>
                    </a>
                    </div>
                </div>
            @endforeach
            <div class="container">
                {{ $images->links() }}
            </div>
        </div>
    @else
        <h1 class="text-center">No images available yet</h1>
    @endif
@endsection
