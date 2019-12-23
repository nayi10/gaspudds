@extends('dash-master')
@section('title', "Create Role")

@section('content')
<div class="row">
    <div class='col-md-5 mx-auto'>
        <div class="card mt-4 px-4">
            <legend class="card-header"><i class='mdi mdi-lock'></i> Add Role</legend>
            <form method='post'>
                @include('shared.alerts')
                {{ csrf_field() }}
                <div class="form-group mt-3">
                    <label for='name'>Name</label>
                    <input name="name" class='form-control'>
                </div>
                    
                <h4>Assign Permissions</h4>
                <div class="form-group">
                    @foreach ($permissions as $permission) 
                        <input type="checkbox" name="permissions[]" id="{{ $permission->name }}" value="{{ $permission->id }}">
                        <label for="{{ $permission->name }}">{{ ucfirst($permission->name) }}</label><br>
                    @endforeach
                </div>
                <button type="submit" class='btn btn-raised btn-primary pull-right'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection