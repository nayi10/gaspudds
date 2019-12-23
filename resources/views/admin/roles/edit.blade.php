@extends('dash-master')
@section('title', "Edit Permission")

@section('content')
<div class="row">
    <div class='col-md-4 mx-auto'>
        <div class="card mt-4 p-3">
            <legend class="card-header"><i class='mdi mdi-edit mr-1'></i>Edit {{ $role->name }}</legend>
            <form method='Post'>
                @include('shared.alerts')
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group mt-3">
                    <label for='name'>Name</label>
                    <input name="name" id="name" value="{{ $role->name }}" class='form-control'>
                </div>
                <h4>Assign Permissions</h4>
                <div class="form-group">
                    @foreach ($permissions as $permission) 
                        <input type="checkbox" name="permissions[]" id="{{ $permission->name }}" value="{{ $permission->id }}">
                        <label for="{{ $permission->name }}">{{ ucfirst($permission->name) }}</label><br>
                    @endforeach
                </div>
                <button type="submit" class='btn btn-raised btn-primary'>Submit edit</button>
            </form>
        </div>
    </div>
</div>
@endsection