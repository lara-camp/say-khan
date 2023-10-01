@extends('Admin.layouts.master')
@section('title','Clinic Edit')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Edit Clinic</h2>
            <form action="{{ route('admin.clinicUpdate',encrypt($data->id)) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name',$data->name) }}">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" rows="4" placeholder="Enter your Address here..." name="address">{{ old('name',$data->address) }}</textarea>
                    @error('address')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>
@endsection
