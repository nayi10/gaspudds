@extends('dash-master')
@section('title', 'Manage Permissions')

@section('content')

<div class="col-12">
    <div class="card mt-4 px-4">
        <h1 class="text-center card-header" style="font-size:1.5rem;"><i class="mdi mdi-lock"></i> Available Permissions
            <a href="{{ route('users') }}" class="btn btn-default btn-raised pull-right">Users</a>
            <a href="{{ route('roles.index') }}" class="btn btn-default btn-raised pull-right">Roles</a>
        </h1>
        @include('shared.alerts')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Permissions</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td> 
                        <td>
                        <a href="{{ URL::to('admin/permissions/edit/'.$permission->id) }}" class="btn btn-raised btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        <form method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{{ $permission->id }}">
                            <button type="submit" class='btn btn-raised btn-sm btn-danger'>Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $permissions->links() }}
        </div>
    </div>
    <a href="{{ URL::to('admin/permissions/create') }}" class="btn btn-raised btn-success pull-right mt-3">
        Add Permission
    </a>
</div>
@endsection