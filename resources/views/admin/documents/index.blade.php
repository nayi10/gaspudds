@extends('dash-master')

@section('title', "GASP UDS | Documents")

@section('content')
    <div class="row">
        <div class="col">
            @if (!$documents->isEmpty())
                <div class="card">
                    <legend class="card-header">
                        Uploaded Lectures & Tutorials
                    </legend>
                    @include('shared.alerts')
                    <div class="card-body">
                        <table class="table table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>File type</th>
                                    <th colspan="2">Title</th>
                                    <th>Size</th>
                                    <th>Category</th>
                                    <th colspan="2">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                <tr>
                                    @php
                                        $fileType = AppHelper::getFileExtension($document->document_url);
                                        $image = "Image".$fileType.".png";
                                    @endphp
                                    <td>
                                        <img class="img-thumbnail" src="{{ asset("images/$image") }}" style="width:100px;">
                                    </td>
                                    <td colspan="2">{{ $document->title }}
                                    </td>
                                    <td>{{ AppHelper::getFileSize($document->document_url) }}MB</td>
                                    <td>{{ $document->category }}</td>
                                    <td colspan="2">
                                        <a href="{{ asset("storage/$document->document_url") }}" download="{{ $document->title }}" class="btn btn-raised py-1 btn-sm btn-primary">Download</a>
                                        <form method="POST" class="m-0 d-inline">
                                            {{ csrf_field() }}
                                            @php
                                                if(($document->uploaded_by == Auth::user()->name) || 
                                                Auth::user()->hasPermissionTo('administer site content')){
                                                    $state = "";
                                                } else {
                                                    $state = "disabled";
                                                }
                                            @endphp
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id" value="{{ $document->id }}">
                                            <input type="hidden" name="url" value="{{ $document->document_url }}">
                                            <button type="submit" {{ $state }} class='btn btn-raised btn-sm py-1 btn-danger'>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Page {{ $documents->currentPage() }} of {{ $documents->lastPage() }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $documents->links() }}
                    </div>
                </div>
                <a href="{{ route('lm.create') }}" class="btn btn-raised btn-primary mt-3 pull-right">Upload more</a>
            @else
                <p class="text-center">
                    <legend class="my-5">Nothing to display</legend>
                    <a href="{{ route('lm.create') }}" class="btn btn-raised btn-primary">Upload your lectures</a>
                </p>
            @endif
        </div>
    </div>
@endsection
