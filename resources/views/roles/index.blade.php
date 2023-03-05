@extends('layouts.app')
@section('content')
@role('Admin')
    I am a super-admin!
@else
    I am not a super-admin...
@endrole
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
           
            @role('Admin')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endrole
            

            
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @role('Admin')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endrole
            @role('Admin')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endrole
        </td>
    </tr>
    @endforeach
</table>
{!! $roles->render() !!}
<p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p>
@endsection