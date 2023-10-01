@extends('Admin.layouts.master')

@section('title','View')

@section('content')
<div class="container ">
    <h1 class="text-center mt-2">Clinic Lists</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="pb-3">
        <a href="{{ route('admin.clinicCreate') }}"><button class="btn btn-primary">Create Clinic</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clinics as $clinic)
            <tr>
                <td>{{ $clinic->name }}</td>
                <td>{{ $clinic->address }}</td>
                <td>{{ $clinic->created_at->diffForHumans() }}</td>
                <td>
                    <button class="btn btn-primary"><a href="{{ route('admin.clinicEdit',encrypt($clinic->id)) }}" class="text-white text-decoration-none">Edit</a></button>
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><a href="{{ route('admin.clinicDelete',encrypt($clinic->id)) }}" class="text-white text-decoration-none">Delete</a></button>

                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

</div>
@endsection
