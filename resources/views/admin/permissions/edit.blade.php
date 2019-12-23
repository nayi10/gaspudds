@extends('dash-master')
@section('title', "Edit Permission")

@section('content')
<div class="row">
    <div class='col-md-5 mx-auto'>
        <div class="card mt-4 px-4">
            <legend class="card-header"><i class='mdi mdi-edit mr-1'></i>Edit <b>{{ $permission->name }}<b></legend>
            <form method='Post'>
                @include('shared.alerts')
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for='name'>Name</label>
                    <input name="name" value="{{ $permission->name }}" class='form-control'>
                </div><br>
                <button type="submit" class='btn btn-raised btn-primary'>Submit edit</button>
            </form>
        </div>
    </div>
</div>
@endsection