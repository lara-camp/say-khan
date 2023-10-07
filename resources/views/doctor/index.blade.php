@extends('doctor.layouts.master')
@section('content')

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


<h2>Welcome {{ Auth::guard('doctor')->user()->name }}</h2>

<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th scope="col">Action </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="align-items-center">
                <div class="btn-group" doctor="group">
                    <a href="{{ route('feedback.create', encrypt(auth()->guard('doctor')->user()->id)) }}" type="button" class="btn btn-danger">Give Feedback</a>
                    <a href="{{ route('doctor.report.income', encrypt(auth()->guard('doctor')->user()->id)) }}" type="button" class="btn btn-danger">Income Report</a>
                    <a href="{{ route('doctor.edit', encrypt(auth()->guard('doctor')->user()->id)) }}" type="button" class="btn btn-danger">Edit</a>
                    <a href="{{ route('clinicSubscription.create', encrypt(auth()->guard('doctor')->user()->id)) }}" type="button" class="btn btn-danger">Buy Subscription</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@if (auth()->guard('doctor')->check())
    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link">Logout</button>
    </form>
@endif

@endsection