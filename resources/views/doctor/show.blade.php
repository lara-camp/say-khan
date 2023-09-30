@extends('doctor.layouts.master')
@section('content')
<h1 class="mb-0">Detail</h1>
    <hr/>
    
      <div class="row mb-1">
        
        <div class="col-6 offset-1 mb-2">
          <input type="text" name="name" class="form-control" placeholder="Name" value="{{$doctor->name}}" readonly>
        </div>
        <div class="col-6 offset-1 mb-2">
          <input type="text" name="speciality" class="form-control" placeholder="Speciality" value="{{$doctor->speciality}}" readonly>
        </div>
       

      
        <div class="col-6 offset-1 mb-2">
          <input type="tel" name="phone" class="form-control" placeholder="phone" value="{{$doctor->phone}}" readonly>
        </div>
        <div class="col-6 offset-1 mb-2">
            <input type="text" name="address" class="form-control" placeholder="address" value="{{$doctor->address}}" readonly>
          </div>
          <div class="col-6 offset-1 mb-2">
            <input type="email" name="email" class="form-control" placeholder="email" value="{{$doctor->email}}" readonly>
          </div>
          {{-- <div class="col-6 offset-1 mb-2">
            <input type="password" name="password" class="form-control" placeholder="password" value="{{$doctor->password}}" readonly>
          </div> --}}
        <div class="col-6 offset-1 mb-2">
            <label class="form-control">Create_At</label>
            <input type="text" name="status" class="form-control" placeholder="created_at" value="{{$doctor->created_at}}"readonly>
          </div>
          <div class="col-6 offset-1 mb-2">
            <label class="form-control">Update_At</label>
            <input type="text" name="status" class="form-control" placeholder="update_at" value="{{$doctor->update_at}}" readonly>
          </div>
      </div>
@endsection