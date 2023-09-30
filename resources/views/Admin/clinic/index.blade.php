@extends('Admin.layouts.master')

@section('title','View')

@section('content')
<div class="container ">
    <h1 class="text-center my-5">Clinic Lists</h1>
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
            <tr>
                <td>John Doe</td>
                <td>123 Main St</td>
                <td>2023-09-30</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>456 Elm St</td>
                <td>2023-09-29</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>

    </table>

</div>
@endsection
