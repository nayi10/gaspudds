@extends('dash-master')

@section('title', 'Create a new user')

@section('content')
<form method="POST">
    {{ csrf_field() }}
    <div class='row'>
        <div class="col">
            <div class="card">
                <legend class="card-header text-center">Add member</legend>
                <div class="card-body">
                    @include('shared.alerts')
                    
                    <div class="form-inline mb-4 w-100">
                        <div class="form-group w-50">
                            <label for="student_id">Student ID</label>
                            <input class="form-control mx-3" type="text" value="{{ old('student_id') }}" name="student_id" id="student_id">
                        </div>
                        <div class="form-group ml-3">
                            <label for="name">Name</label>
                            <input class="form-control mx-3" type="text" value="{{ old('name') }}" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-inline mb-4">
                        <div class="form-group w-75">
                            <label for="email">Email Address</label>
                            <input class="form-control mx-3 w-75" type="email" value="{{ old('email') }}" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-inline mb-4 w-100">
                        <div class="form-group w-50">
                            <label for="password">Password</label>
                            <input class="form-control mx-3" type="password" name="password" id="password">
                        </div>
                        <div class="form-group ml-3">
                            <label for="conf-password">Confirm Password</label>
                            <input class="form-control mx-3" type="password" name="conf-password" id="conf-password">
                        </div>
                    </div>
                    <div class="form-inline w-100 my-3">
                        <div class="form-group w-50">
                            <label class="mr-5">User type</label>
                            @foreach ($roles as $role)
                                <label for="{{ $role->name }}Role" class="mr-md-3 text-info">
                                    <input class="form-control mx-md-1" type="radio" value="{{ $role->id }}" name="role" id="{{ $role->name }}Role">
                                    {{ ucfirst($role->name) }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group hide" id="fgToggle">
                            <label for="position">Position</label>
                            <select class="custom-select custom-select-sm mx-md-3 px-md-5" name="position" id="position" required>
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
                    <button type="submit" class="btn btn-raised btn-primary float-right">Create user</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection