@extends('Admin.layouts.master')

@section('title','View')

@section('content')
<div class="container ">
    <h1 class="text-center mt-2">Role Permission Lists</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="pb-3">
        <a href="{{ route('rolePermission.create') }}"><button class="btn btn-primary">Create Role Permission</button></a>
    </div>
    @if($data->isEmpty())
    <div class="text-center">
        <h3 class="text-danger">There is no data here.</h3>
    </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Role</th>
                <th>Value</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->role->name }}</td>
                <td>{{ $d->permission->value }}</td>
                <td>{{ $d->created_at->diffForHumans() }}</td>
                <td>
                    <button class="btn btn-primary"><a href="{{ route('rolePermission.edit',encrypt($d->id)) }}" class="text-white text-decoration-none">Edit</a></button>
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><a href="{{ route('rolePermission.delete',encrypt($d->id)) }}" class="text-white text-decoration-none">Delete</a></button>
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

    @endif


</div>
@endsection
