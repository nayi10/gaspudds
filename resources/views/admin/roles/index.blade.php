@extends('dash-master')
@section('title', 'Manage Permissions')

@section('content')

<div class="col">
    <div class="card mt-4 px-4">
        <legend class="card-header"><i class="mdi mddi-lock"></i> Available Roles
            <a href="{{ route('users') }}" class="btn btn-default btn-raised pull-right">Users</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default btn-raised pull-right">Permissions</a>
        </legend>
        @include('shared.alerts')
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Operations/Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td> 
                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                        <td>
                        <a href="{{ URL::to('admin/roles/edit/'.$role->id) }}" class="btn btn-raised btn-sm btn-info" style="margin-right:3px;padding: 6.5px;">Edit</a>
                        <form method="POST" class="m-0 d-inline">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <button type="submit" class='btn btn-raised btn-sm btn-danger'>Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ URL::to('admin/roles/create') }}" class="btn btn-raised btn-success pull-right mt-3">Add Role</a>
</div>
@endsection