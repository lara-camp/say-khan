@extends('role.layouts.master')
@section('content')
<h1 class="mb-0">Detail</h1>
    <hr/>
    
      <div class="row mb-1">
        <div class=" mb-3">
            <label class="form-control">Name</label>
          <input type="text" name="name" class="form-control" placeholder="name" value="{{$role->name}}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-control">Type</label>
          <input type="text" name="type" class="form-control" placeholder="type" value="{{$role->type}}" readonly>
    </div>
        <div class="col mb-3">
            <label class="form-control">Status</label>
          <input type="text" name="status" class="form-control" placeholder="status" value="{{$role->status}} " readonly>
        </div>
        <div class="col mb-3">
            <label class="form-control">Create At</label>
            <input type="text" name="status" class="form-control" placeholder="created_at" value="{{$role->created_at}}"readonly>
          </div>
          <div class="col mb-3">
            <label class="form-control">update At</label>
            <input type="text" name="status" class="form-control" placeholder="update_at" value="{{$role->update_at}}" readonly>
          </div>
@endsection