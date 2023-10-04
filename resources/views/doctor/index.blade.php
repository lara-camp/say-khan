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
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
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
    @if ($doctors->count() > 0)
        @foreach ($doctors as $doctor)
        <tr>
            <td class="align-items-center">{{ $loop->iteration }}</td>
            <td class="align-items-center">{{ $doctor->name }}</td>
            <td class="align-items-center">{{ $doctor->speciality }}</td>
            <td class="align-items-center">{{ $doctor->phone }}</td>
            <td class="align-items-center">{{ $doctor->email }}</td>
            {{-- <td class="align-items-center">{{ $doctor->password }}</td> --}}
            <td class="align-items-center">{{ $doctor->address }}</td>
            <td class="align-items-center">
                <div class="btn-group" doctor="group">
                    <a href="{{ route('doctor.edit', encrypt($doctor->id)) }}" type="button" class="btn btn-danger">Edit {{ $doctor->id }}</a>
                    <a href="{{ route('feedback_create', encrypt($doctor->id)) }}" type="button" class="btn btn-danger">Give Feedback</a>
                    <a href="{{ route('clinic_subscription_create', encrypt($doctor->id)) }}" type="button" class="btn btn-danger">Buy Subscription</a>
                    <form method="post" action="{{ route('doctor.destroy',encrypt($doctor->id)) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-success" onclick="return confirm('i want to delete this')" alt="">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="2">
                There is no doctors
            </td>
        </tr>
        @endif
    </tbody>
</table>

@endsection
