{{-- \resources\views\roles\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="col-lg-12">

    <div class="row">
        <div class="col-md-6">
                <h1><i class="fa fa-key"></i> Roles</h1>
        </div>
        <div class="col-md-6 d-flex flex-row-reverse bd-highlight">
            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">
                <button type="button" class="btn btn-outline-primary">Users</button>
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
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>

                        <div class="d-flex flex-row">
                            <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-primary">
                                Edit
                            </a>
                            <span style="width: 10px"></span>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

</div>

@endsection