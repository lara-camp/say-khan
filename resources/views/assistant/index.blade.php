@extends('assistant.layouts.master')
@section('content')
@if (Session::has('success'))
<div class="alter alert-warning" assistant="alert">
    {{ Session::get('success') }}
</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<h2>Welcome {{ Auth::guard('assistant')->user()->name }}</h2>
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th scope="col">Action </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="align-items-center">
                <div class="btn-group" assistant="group">
                    <a href="{{ route('assistant.edit', encrypt($assistant->id)) }}" type="button" class="btn btn-danger">Profile</a>
                    <a href="{{ route('assistant.changePasswordPage') }}" type="button" class="btn btn-danger">Change Password</a>
                    <a href="{{ route('patient.list', encrypt($assistant->id)) }}"  type="button" class="btn btn-danger">Patient</a>
                    <a href="{{ route('patientDetails.list' , encrypt($assistant->id))}}"  type="button" class="btn btn-danger">Patients Detail</a>
                    <a href="{{ route('patientRecords.list' , encrypt($assistant->id))}}"  type="button" class="btn btn-danger">Patients Record</a>
                    <a href="{{ route('patient.create')}}"  type="button" class="btn btn-danger">Create Patient</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@if (auth()->guard('assistant')->check())
    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link">Logout</button>
    </form>
@endif

@endsection