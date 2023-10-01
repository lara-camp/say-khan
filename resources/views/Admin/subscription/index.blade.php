@extends('Admin.layouts.master')
@section('title','Subscription List')
@section('content')
<div class="container ">
    <h1 class="text-center mt-2">Subscription Lists</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="pb-3">
        <a href="{{ route('admin.subCreate') }}"><button class="btn btn-primary">Create Subscription</button></a>
    </div>
    @if($subscriptions->isEmpty())
    <div class="text-center">
        <h1 class="text-danger">There is no Record.</h1>
    </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Plan</th>
                <th>Fee</th>
                <th>Duration</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)

            <tr>
                <td>{{ $subscription->plan }}</td>
                <td>{{ $subscription->fee }}ks</td>
                <td>
                    @if ($subscription->duration == 3)
                    Three Months
                    @elseif ($subscription->duration == 12)
                    A Year
                    @else
                    Six Months
                    @endif
                </td>
                <td>{{ $subscription->created_at->diffForHumans() }}</td>
                <td>
                    <button class="btn btn-primary"><a href="{{ route('admin.subEdit',encrypt($subscription->id)) }}" class="text-white text-decoration-none">Edit</a></button>
                    <button class="btn btn-danger"><a href="{{ route('admin.subDelete',encrypt($subscription->id)) }}" class="text-white text-decoration-none" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></button>

                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

    @endif

</div>

@endsection
