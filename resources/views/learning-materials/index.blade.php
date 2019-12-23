@extends('master')
@section('title', "Download lecture documents")
@section('content')
    <div class="container-fluid mt-4">
        <h1 class="text-center text-md">Download lecture notes, tutorials, books etc</h1>
        <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with buttons">
            <div class="btn-group mr-2" role="group">
                <a href="/learning-materials" class="btn btn-raised btn-primary" style="text-transform:capitalize;">
                    All
                </a>
                @if (!$categories->isEmpty())
                    @foreach ($categories as $category)
                        <a href="{{ route('lm.category', $category->category) }}" class="btn btn-raised btn-primary" style="text-transform:capitalize;">
                            {{ $category->category }}
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            @if ($documents->isEmpty())
                <legend class="text-center mt-5">No documents have been uploded</legend>
            @else
                @foreach ($documents as $document)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card rounded">
                            @php
                                $fileType = AppHelper::getFileExtension($document->document_url);
                                $image = "Image".$fileType.".png";
                                $size = AppHelper::getFileSize($document->document_url);
                            @endphp
                            <img src="{{ asset("images/$image") }}" alt="{{ $document->title }}" class="card-img-top rounded-top" height="200px">
                            <legend class="card-header text-center" style="font-size: 1rem;padding:5px 0;border:0;">
                                {{ $document->title }}
                            </legend>
                            <div class="card-footer" style="position:relative;">
                                <small class="text-xs">
                                    <span class="mdi mdi-filter-list text-warning"></span> 
                                    <small>{{ $document->category }}</small>
                                </small>
                                <small style="position:absolute;left:45%;" class="text-xs">
                                    <span class="mdi mdi-memory text-info"></span> 
                                    <small>{{ $size }}MB</small>
                                </small>
                                <a class="btn btn-sm btn-default px-2 py-1 my-0 pull-right text-xs" 
                                href="{{ asset('storage/'.$document->document_url) }}" download="{{ $document->title }}">
                                    <span class="mdi mdi-file-download text-sm"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    {!! $documents->links() !!}
                </div>
            @endif
        </div>
    </div>
@endsection