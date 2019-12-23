@extends('dash-master')
@section('title', 'Edit user details')
@section('content')
    <form method="POST" action="{{ action('Admin\UsersController@update', $toEdit->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class='row'>
            <div class="col-md-9 m-0" style="position:relative;left:0%">
                <div class="card">
                    <legend class="card-header text-center">Edit member details</legend>
                    <div class="card-body">
                        @include('shared.alerts')
                        
                        <div class="form-inline mb-4 w-100">
                            <div class="form-group w-50">
                                <label for="student_id">Student ID</label>
                                <input class="form-control mx-3" type="text" value="{{ $toEdit->student_id }}" name="student_id" id="student_id">
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
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="mr-5">User type</label>
                                @foreach ($roles as $role)
                                    <label for="{{ $role->name }}Role" class="mr-3 text-info">
                                        <input class="form-control mx-1" type="radio" value="{{ $role->id }}" name="role" id="{{ $role->name }}Role">
                                        {{ ucfirst($role->name) }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group hide w-100 mt-3" id="fgToggle">
                            <label for="position">Position</label>
                            <select class="custom-select custom-select-sm w-50 mx-md-3 px-md-5" name="position" id="position" required>
                                <option selected>--- Select Position ---</option>
                                <option value="President">President</option>
                                <option value="Organizer">Organizer</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Treasurer">Treasurer</option>
                                <option value="PAO">PAO</option>
                                <option value="PRO">PRO</option>
                                <option value="WoCom">WoCom</option>
                            </select>
                        </div>    
                    </div>
                </div>
                <div class="card shadow mt-2">
                    <div class="card-body justify-content-center d-flex">
                        <label for="avatar" id="avatar-upload">
                            <span class="mdi mdi-file-upload mdi-4x mt-2"></span>
                            <input type="file" name="avatar" id="avatar">
                            <p class="text-muted mt-2" style="font-size:0.8rem">Upload Profile Image</p>
                        </label>
                        <div id="selected-img" class="hide">
                            <img class="img-fluid" id="preview">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-raised btn-primary mt-3 float-right">Update user</button>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset(AppHelper::getUserProfileImage($toEdit->student_id)) }}" class="card-img-top" height="180px">
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
                </div>
            </div>
        </div>
    </form>
@endsection