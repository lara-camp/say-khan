@extends('assistant.layouts.master')
@section('content')
<h1 class="mb-0">Detail</h1>
    <hr/>
    
      <div class="row mb-1">
        
        <div class="col-6 offset-1 mb-2">
          <input type="text" name="name" class="form-control" placeholder="Name" value="{{$assistant->name}}" readonly>
        </div>
    
        <div class="col-6 offset-1 mb-2">
          <input type="tel" name="phone" class="form-control" placeholder="phone" value="{{$assistant->phone}}" readonly>
        </div>
        <div class="col-6 offset-1 mb-2">
            <input type="text" name="address" class="form-control" placeholder="address" value="{{$assistant->address}}" readonly>
          </div>
          <div class="col-6 offset-1 mb-2">
            <input type="email" name="email" class="form-control" placeholder="email" value="{{$assistant->email}}" readonly>
          </div>
          {{-- <div class="col-6 offset-1 mb-2">
            <input type="password" name="password" class="form-control" placeholder="password" value="{{$assistant->password}}" readonly>
          </div> --}}
        <div class="col-6 offset-1 mb-2">
            <label class="form-control">{{$assistant->created_at->diffForHumans()}}</label>
        
          </div>
          <div class="col-6 offset-1 mb-2">
            <label class="form-control">Update_At</label>
           
          </div>
      </div>
@endsection