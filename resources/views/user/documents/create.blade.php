@extends('master')

@section('title', 'Upload lecture materials')
@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-none border border-light">
                <legend class="card-header text-center text-ms">
                    Upload your document
                    (<small>Accepted formats are .pdf,.docx,.doc,.ppt,.pptx,.odt,.odp,.epub</small>)
                </legend>

                @include('shared.alerts')
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-inline mb-4 w-100">
                            <div class="form-group w-50">
                                <label for="title">Title</label>
                                <input class="form-control mx-3 w-75" type="text" value="{{ old('title') }}" name="title" id="title">
                            </div>
                            <div class="form-group ml-3">
                                <label for="category">Category</label>
                                <select class="custom-select custom-select-sm mx-3 px-5" name="category" id="category">
                                    <option selected>Select one</option>
                                    <option value="Lectures">Lectures</option>
                                    <option value="Tutorials">Tutorials</option>
                                    <option value="Samples">Samples</option>
                                    <option value="Notices">Notices</option>
                                </select>
                                {{-- <input class="form-control mx-3" type="text" value="{{ old('category') }}"> --}}
                            </div>
                        </div>
                        <div class="custom-file">
                            <input id="document" class="custom-file-input" type="file" accept=".pdf,.odt,.odp,.epub,.docx,.doc,.pptx,.ppt" name="document">
                            <label for="document" class="custom-file-label">Choose a document</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-raised btn-primary pull-right mt-1" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection