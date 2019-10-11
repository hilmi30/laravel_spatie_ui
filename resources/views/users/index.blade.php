{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="col-lg-12">
    <div class="row">
        <div class="col-md-6">
            <h1><i class="fa fa-users"></i> User Administration</h1>
        </div>
        <div class="col-md-6 d-flex flex-row-reverse bd-highlight">
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">
                <button type="button" class="btn btn-outline-primary">Roles</button>
            </a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">
                <button type="button" class="btn btn-outline-danger">Permissions</button>
            </a>    
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                        <div class="d-flex flex-row">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                            <span style="width: 10px"></span>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>

</div>

@endsection