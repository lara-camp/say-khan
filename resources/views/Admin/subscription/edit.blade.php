@extends('Admin.layouts.master')
@section('title','Clinic Edit')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Edit Subscription</h2>
            <form action="{{ route('admin.subUpate',encrypt($data->id)) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="plan" class="form-label">Plan</label>
                    <input type="text" class="form-control" id="plan" name="plan" placeholder="Enter Plan name" value="{{ old('plan',$data->plan) }}">
                    @error('plan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <select class="form-select form-select" name="duration" id="duration">
                        <option selected value="">Select one</option>
                        <option value="3" @if($data->duration == 3) selected @endif>Three Months</option>
                        <option value="6" @if($data->duration == 6) selected @endif>Six Months</option>
                        <option value="12" @if($data->duration == 12) selected @endif>One Year</option>

                    </select>
                    @error('duration')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fee" class="form-label">Fee</label>
                    <input type="text" class="form-control" id="fee" name="fee" placeholder="Enter Fee" value="{{ old('fee',$data->fee+00) }}">
                    @error('fee')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>
@endsection
