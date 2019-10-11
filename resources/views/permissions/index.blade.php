{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="col-lg-12">
    <div class="row">
        <div class="col-md-6">
            <h1><i class="fa fa-key"></i>Available Permissions</h1>
        </div>
        <div class="col-md-6 d-flex flex-row-reverse bd-highlight">
            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">
                <button type="button" class="btn btn-outline-primary">Users</button>
            </a>
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">
                <button type="button" class="btn btn-outline-danger">Roles</button>
            </a>    
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

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
                        <div class="d-flex flex-row">
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-primary">
                                Edit
                            </a>
                            <span style="width: 10px"></span>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!} 
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

</div>

@endsection