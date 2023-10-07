@extends('doctor.layouts.master')
@section('content')
<h1 class="mb-0">Edit</h1>
    <hr/>
    
    <form action="{{ route('doctor.update',$doctor->id)}}" method="POST"
    >
    @csrf
      @method('PUT')
      
      <div class="row mb-1">
        <div class="col-6 offset-1 mb-2">
          <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name',$doctor->name)}}">
        </div>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="col-6 offset-1 mb-2">
          <input type="text" name="speciality" class="form-control" placeholder="Speciality" value="{{old('speciality', $doctor->speciality)}}">
        </div>
        </div>
        @error('speciality')
            <div class="text-danger">{{ $message }}</div>
            @enderror

      
        <div class="col-6 offset-1 mb-2">
          <input type="tel" name="phone" class="form-control" placeholder="phone" value="{{ old('phone',$doctor->phone)}}">
        </div>
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="col-6 offset-1 mb-2">
            <input type="text" name="address" class="form-control" placeholder="address" value="{{ old('address',$doctor->address)}}">
          </div>
          @error('address')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="col-6 offset-1 mb-2">
            <input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email',$doctor->email)}}">
          </div>
          @error('email')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          {{-- <div class="col-6 offset-1 mb-2">
            <input type="password" name="password" class="form-control" placeholder="password" value="{{$doctor->password}}">
          </div>
          @error('password')
          <div class="text-danger">{{ $message }}</div>
          @enderror --}}
         
        <div class="col-6 offset-1 mb-2">
            <label class="form-control">{{$doctor->created_at->diffForHumans()}}</label>
           
        </div>
      </div>
        
      </div>
          <div class="row">
            <div class="col-6 offset-1">
              <button class="btn btn-primary">Update</button>
            </div>
          </div>
    </form>
@endsection