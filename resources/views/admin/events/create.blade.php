@extends('dash-master')
@section('title', 'Create a New Event')

@section('content')
    <form method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class='row'>
            <div class="col">
                <div class="card">
                    <legend class="card-header text-center">Create an event</b></legend>
                    <div class="card-body ml-3">
                        @include('shared.alerts')
                        <div class="form-inline mb-5">
                            <div class="form-group w-100">
                                <label for="title">Event name</label>
                                <input class="form-control ml-3 mr-5 w-25" type="text" value="{{ old('title') }}" name="title" id="title">
                                <label for="publisher">Publisher</label>
                                <input class="form-control mx-3" type="text" value="{{ old('publisher') }}" name="publisher" id="publisher">
                                <label for="contact">Contact</label>
                                <input class="form-control ml-3 mr-" type="text" value="{{ old('contact') }}" name="contact" id="contact">
                           </div>
                        </div>
                        <div class="form-inline mb-5">
                            <div class="form-group w-50">
                                <label for="title">Venue</label>
                                <input class="form-control mx-3" type="text" value="{{ old("venue") }}" name="venue" id="venue">
                            </div>
                            <div class="form-group w-50">
                                <label for="statusPublished">
                                    <input class="form-control mx-3" type="radio" value="published" name="status" id="statusPublished">
                                    Published
                                </label>
                                <label for="statusPending">
                                    <input class="form-control mx-3" type="radio" value="pending" name="status" id="statusPending">
                                    Pending
                                </label>
                                <label for="statusRejected">
                                    <input class="form-control mx-3" type="radio" value="rejected" name="status" id="statusRejected">
                                    Rejected
                                </label>
                           </div>
                        </div>
                        <div class="form-group w-100 mb-5">
                            <label for="content">Decription</label>
                            <textarea class="form-control mx-3 w-100" rows="15" type="content" name="content" id="content">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-inline mb-4">
                            <div class="form-group w-25">
                                <label for="start_date">From</label>
                                <input class="form-control mx-3" type="date" name="start_date" id="start_date" value="{{ old('start_date') }}">
                            </div>
                            <div class="form-group w-50">
                                <label for="end_date">To</label>
                                <input class="form-control mx-3" type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="promo_status" class="label">
                                <input class="custom-checkbox mx-3" type="checkbox" name="promo_status" id="promo_status" value="promoted">
                                Promote</label>
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            <div class="form-group">
                                <label for="banner">
                                    <input class="custom-file-input" type="file" name="banner" id="banner" value="{{ old('banner') }}" accept="png,jpg,jpeg">
                                    Event banner
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection