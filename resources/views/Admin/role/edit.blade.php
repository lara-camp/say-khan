@extends('Admin.layouts.master')
@section('title','Edit-Role')
@section('content')
<h1 class="mb-0">Edit</h1>
<hr />

<form action="{{ route('role.update',encrypt($role->id))}}" method="POST">

    @csrf
    <div class="row mb-1">
        <div class=" mb-3">
            <label class="form-control">Name</label>
            <input type="text" name="name" class="form-control" placeholder="name" value="{{$role->name}}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label class="form-control">Type</label>
            <input type="text" name="type" class="form-control" placeholder="type" value="{{$role->type}}">
            @error('type')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label class="form-control">Status</label>
            <input type="text" name="status" class="form-control" placeholder="status" value="{{$role->status}} ">
            @error('status')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection
