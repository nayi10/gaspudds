@extends('dash-master')
@section('title', "Create Permission")

@section('content')
<div class="row">
    <div class='col-md-5 mx-auto'>
        <div class="card mt-4 px-5">
            <h1 class="card-header" style="font-size: 1.2rem;">Add Permission</h1>
            <form method='post'>
                @include('shared.alerts')
                {{ csrf_field() }}
                <div class="form-group">
                    <label for='name'>Name</label>
                    <input name="name" class='form-control'>
                </div><br>
                @if(!$roles->isEmpty())
                    <h4>Assign Permission to Roles</h4>

                    @foreach ($roles as $role) 
                        <input type="checkbox" name="roles[]" id="{{ $role->name }}" value="{{ $role->id }}">
                        <label for="{{ $role->name }}">{{ ucfirst($role->name) }}</label><br>
                    @endforeach
                @endif
                <br>
                <button type="submit" class='btn btn-raised btn-primary'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection