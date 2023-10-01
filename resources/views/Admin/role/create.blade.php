@extends('Admin.layouts.master')
@section('title','Role-Create')
@section('content')
<div class="container">
    <h1 class="mb-0">Adding</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <hr />
    <form action="{{ route('role.store')}}" method="POST">
        @csrf
        <div class="row mb-1">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="type" class="form-control" placeholder="type" value="{{ old('type') }}">
                @error('type')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>
@endsection
