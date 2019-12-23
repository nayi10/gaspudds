@extends('master')
@section('title', 'Your profile details')
@section('content')
<div class="row mt-4">
    <div class="col-md-10 mx-auto">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class='row'>
                <div class="col-md-9 m-0" style="position:relative;left:0%">
                    <div class="card shadow-none border border-light">
                        <legend class="card-header text-center">Your details</legend>
                        <div class="card-body">
                            @include('shared.alerts')
                            
                            <div class="form-inline mb-4 w-100">
                                <div class="form-group w-50">
                                    <label for="student_id">Student ID</label>
                                    <input id="student_id" class="form-control mx-3" name="student_id" value="{{ $toEdit->student_id }}">    
                                </div>
                                <div class="form-group ml-3">
                                    <label for="name">Name</label>
                                    <input class="form-control mx-3" type="text" value="{{ $toEdit->name }}" name="name" id="name">
                                </div>
                            </div>

                            <div class="form-inline mb-4">
                                <div class="form-group w-100">
                                    <label for="email">Email Address</label>
                                    <input class="form-control mx-3 w-75" type="email" value="{{ $toEdit->email }}" name="email" id="email">
                                </div>
                            </div>
                            <div class="form-inline mb-4 w-100">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control mx-3" type="password" name="password" id="password">
                                </div>
                                <div class="form-group ml-3">
                                    <label for="conf-password">Confirm Password</label>
                                    <input class="form-control mx-3" type="password" name="conf-password" id="conf-password">
                                </div>
                            </div>
                            <div class="form-group w-100">
                                <label for="about">About you</label>
                                <textarea class="form-control" name="about" id="about">{{ $toEdit->about }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-raised btn-primary pull-right mt-3">Update profile</button>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-none border border-light">
                        <img src="{{ asset(AppHelper::getUserProfileImage($toEdit->student_id)) }}" class="card-img-top rounded-top bg-light" height="180px">
                        <div class="card-body">
                            <h5 class="text-sm text-center">{{ $toEdit->name }}</h5>
                            <p class="card-text" style="font-size:0.8rem">
                                <span class="mdi mdi-email mr-1"></span> {{ $toEdit->email }}
                            </p>
                            <p class="card-text">
                                <span class="mdi mdi-perm-identity mr-1"></span> {{ $toEdit->student_id }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Member since {{ date("F jS, Y", strtotime($toEdit->created_at)) }}</small>
                        </div>
                    </div><br>
                    <div class="card shadow-none border border-light">
                        <div class="card-body justify-content-center d-flex">
                            <label for="avatar" id="avatar-upload">
                                <span class="mdi mdi-file-upload mdi-4x mt-2"></span>
                                <input type="file" name="avatar" id="avatar">
                                <p class="text-muted mt-2" style="font-size:0.8rem">Upload Profile Picture</p>
                            </label>
                            <div id="selected-img" class="hide">
                                <img class="img-fluid" id="preview">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection