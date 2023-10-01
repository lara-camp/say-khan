@extends('doctor.layouts.master')
@section('content')

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0 ">Doctor</h1>
    <a href="{{ route('doctor.create') }}" class="btn btn-primary">New Doctor</a>
</div>

@if (Session::has('success'))
<div class="alter alert-warning" doctor="alert">
    {{ Session::get('success') }}
</div>
@endif

@auth
<h2>Welcome {{ Auth::user()->name }}</h2>
<a href="{{ route('logout') }}">Logout</a>
@endauth

{{-- table --}}
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Speciality</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Action </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@endsection
