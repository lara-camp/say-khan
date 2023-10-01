@extends('assistant.layouts.master')
@section('title', 'assistant')
@section('content')
<h1 class="mb-0">Adding</h1>
<h2>{{ auth()->guard('assistant')->user()->name }}</h2>

<hr />
<form action="{{ route('assistant.store')}}" method="POST">
    @csrf
    <div class="row mb-1">
        <div class="col-6 offset-1 mb-2">
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
        </div>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="col-6 offset-1 mb-2">
            <input type="tel" name="phone" class="form-control" placeholder="phone" value="{{old('phone')}}">
        </div>
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="col-6 offset-1 mb-2">
            <input type="text" name="address" class="form-control" placeholder="address" value="{{old('address')}}">
        </div>
        @error('address')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="col-6 offset-1 mb-2">
            <input type="email" name="email" class="form-control" placeholder="email" value="{{old('email')}}">
        </div>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="col-6 offset-1 mb-2">
            <input type="password" name="password" class="form-control" placeholder="password">
        </div>
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="col-6 offset-1 mb-2">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation Password">
        </div>
        @error('password_confirmation')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <div class="col-6 offset-1">
            <button class="btn btn-primary">Submit</button>
        </div>
    </div>
    @if (auth()->guard('assistant')->check())
    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link">Logout</button>
    </form>
    @endif

</form>
@endsection
