@extends('Admin.layouts.master')
@section('title','Create-Subscription')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Create Subscription</h2>
            <form action="{{ route('admin.subStore') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="plan" class="form-label">Plan</label>
                    <input type="text" class="form-control" id="plan" name="plan" placeholder="Enter Plan name">
                    @error('plan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <select class="form-select form-select" name="duration" id="duration">
                        <option selected value="">Select one</option>
                        <option value="3">Three Months</option>
                        <option value="6">Six Months</option>
                        <option value="12">One Year</option>
                    </select>
                    @error('duration')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fee" class="form-label">Fee</label>
                    <input type="text" class="form-control" id="fee" name="fee" placeholder="Enter Fee">
                    @error('fee')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

</div>
@endsection
