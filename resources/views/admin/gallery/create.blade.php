@extends('dash-master')

@section('title', 'Upload pictures to your galleries')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <legend class="card-header text-center">
                    Upload an image to your gallery
                </legend>

                @include('shared.alerts')
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-inline mb-4 w-100">
                            <div class="form-group w-50">
                                <label for="image_name">Image name</label>
                                <input class="form-control mx-3" type="text" value="{{ old('image_name') }}" name="image-name" id="image_name">
                            </div>
                            <div class="form-group ml-3">
                                <label for="category">Category</label>
                                <select class="custom-select custom-select-sm mx-3 px-5" name="category" id="category">
                                    <option selected>--- Select ---</option>
                                    <option value="Events">Events</option>
                                    <option value="Halls">Halls</option>
                                    <option value="Logo">Logo</option>
                                    <option value="Students">Students</option>
                                    <option value="Other">Other</option>
                                </select>
                                {{-- <input class="form-control mx-3" type="text" value="{{ old('category') }}" name="category" id="category"> --}}
                            </div>
                        </div>
                        <div class="custom-file">
                            <input id="image" class="custom-file-input" type="file" accept=".jpg,.png,.gif" name="image">
                            <label for="image" class="custom-file-label">Choose an image</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-raised btn-primary" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection