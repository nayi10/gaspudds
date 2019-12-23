@extends('dash-master')
@section('title', 'All Registered Members')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <legend class="card-header text-center">Registered Members</legend>
                @include('shared.alerts')
                <div class="card-header">
                    <div class="d-inline">
                        Show only <select id="showOnly" class="d-inline bg-light border-0 px-2 py-1">
                            <option value="members">Members</option>
                            <option value="admins">Admins</option>
                            <option value="executives">Executives</option>
                        </select>
                    </div>
                    <div class="d-inline pull-right">
                        <span class="mdi mdi-access-alarm text-warning"></span> Filter by date <input type="date" class="d-inline bg-light border-0 px-2 py-1">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Student ID</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Added on</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        @if ($user->student_id !== Auth::user()->student_id)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->student_id }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ str_replace(array('[',']','"'),'',$user->roles()->pluck('name')) }}
                                                <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-raised btn-info" title="Edit user" href="{!! action('Admin\UsersController@editUser', $user->id) !!}">
                                                        <span class="mdi mdi-edit"></span>
                                                    </a>
                                                    <form method="POST" class="m-0 d-inline">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                                        <button type="submit" title="Delete this member" class='btn btn-raised btn-sm btn-danger'>
                                                            <span class="mdi mdi-delete"></span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr><td rowspan="5">No users to display</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <span class="pull-right">
                        {{ $users->links() }}
                    </span>
                    Total # of members: {{ count($users) }}
                </div>
            </div>
        </div>
    </div>
@endsection