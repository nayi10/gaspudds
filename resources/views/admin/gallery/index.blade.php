@extends('dash-master')

@section('title', "GASP UDS | Gallery")

@section('content')
    <div class="row">
        <div class="col">
            @if (!$images->isEmpty())
                <div class="card">
                    <legend class="card-header">
                        Uploaded Gallery
                    </legend>
                    @include('shared.alerts')
                    <div class="card-body">
                        <table class="table table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Picture</th>
                                    <th>Image Caption</th>
                                    <th>Category</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $image)
                                <tr>
                                    <td>
                                        <img class="g-img img-thumbnail" src="{{ asset("storage/$image->image_url") }}">
                                    </td>
                                    <td>{{ $image->image_name }}</td>
                                    <td>{{ $image->category }}</td>
                                    <td>
                                        <form method="POST" class="m-0 d-inline">
                                            {{ csrf_field() }}
                                            @php
                                                if(($image->uploaded_by == Auth::user()->name) || 
                                                Auth::user()->hasPermissionTo('administer site content')){
                                                    $state = "";
                                                } else {
                                                    $state = "disabled";
                                                }
                                            @endphp
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id" value="{{ $image->id }}">
                                            <input type="hidden" name="url" value="{{ $image->image_url }}">
                                            <button type="submit" {{ $state }} class='btn btn-raised btn-sm btn-danger'>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $images->links() }}
                        <a href="{{ route('gallery.create') }}" class="btn btn-raised btn-primary pull-right">Upload more</a>
                    </div>
                </div>
            @else
                <p class="text-center">
                    <legend class="my-5">Nothing to display</legend>
                    <a href="{{ route('gallery.create') }}" class="btn btn-raised btn-primary">Upload a picture</a>
                </p>
            @endif
        </div>
    </div>
@endsection
