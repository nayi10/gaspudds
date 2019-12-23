@extends('dash-master')
@section('title', 'Edit Event')

@section('content')
    <form method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class='row'>
            <div class="col">
                <div class="card mt-3">
                    <legend class="card-header text-center">Edit <b>{{ $event->title }}</b></legend>
                    <div class="card-body ml-3">
                        @include('shared.alerts')
                        <div class="form-inline mb-4">
                            <div class="form-group w-100">
                                <label for="title">Event name</label>
                                <input class="form-control ml-3 mr-5 w-25" type="text" value="{{ $event->title }}" name="title" id="title">
                                <label for="publisher">Publisher</label>
                                <input class="form-control mx-3" type="text" value="{{ $event->publisher }}" name="publisher" id="publisher">
                                <label for="contact">Contact</label>
                                <input class="form-control ml-3 mr-5" type="text" value="{{ $event->contact }}" name="contact" id="contact">
                           </div>
                        </div>
                        <div class="form-inline mb-4">
                            <div class="form-group w-50">
                                <label for="title">Venue</label>
                                <input class="form-control mx-3" type="text" value="{{ $event->venue }}" name="venue" id="venue">
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
                        <div class="form-group w-100">
                            <label for="content">Decription</label>
                            <textarea class="form-control mx-3 w-100" rows="15" type="content" name="content" id="content">{{ $event->content }}</textarea>
                        </div>
                        <div class="form-inline mb-4">
                            <div class="form-group w-50">
                                <label for="start_date">From</label>
                                <input class="form-control mx-3" type="date" name="start_date" id="start_date">
                            </div>
                            <div class="form-group w-25">
                                <label for="end_date">To</label>
                                <input class="form-control mx-3" type="date" name="end_date" id="end_date">
                            </div>
                            <div class="form-group">
                                <label for="promo_status" class="label">
                                <input class="custom-checkbox mx-3" type="checkbox" name="promo_status" id="promo_status" value="promoted">
                                Promote</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-raised btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection