@extends('assistant.layouts.master')
@section('content')

{{-- @dd(Auth::check()) --}}


<h3>Welcome,{{ auth()->guard('assistant')->user()->name }}</h3>


<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0 ">Assistant</h1>
    <a href="{{ route('assistant.create') }}" class="btn btn-primary">New Assistant</a>
</div>

@if(Session::has('success'))
<div class="alter alert-warning" assistant="alert">
    {{ Session::get('success') }}
</div>
@endif

{{-- table --}}
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            {{-- <th scope="col">Password</th> --}}
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @if ($assistants->count() >0)
        @foreach ($assistants as $assistant)
        <tr>
            <td class="align-items-center">{{$loop->iteration}}</td>
            <td class="align-items-center">{{$assistant->name}}</td>
            <td class="align-items-center">{{$assistant->phone}}</td>
            <td class="align-items-center">{{$assistant->email}}</td>
            {{-- <td class="align-items-center">{{$assistant->password}}</td> --}}
            <td class="align-items-center">{{$assistant->address}}</td>
            <td class="align-items-center">
                <div class="btn-group" assistant="group">
                    <a href="{{route('assistant.show',encrypt($assistant->id))}}" type="button" class="btn btn-warning">Details</a>
                    <a href="{{route('assistant.edit',encrypt($assistant->id))}}" type="button" class="btn btn-danger">Edit</a>

                    <form method="post" action="{{route('assistant.destroy',encrypt($assistant->id))}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-success" onclick="return confirm('i want to delete this ')" alt="">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="2">
                There is no Assistant
            </td>
        </tr>
        @endif
        @if (auth()->guard('assistant')->check())
        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
        </form>
        @endif

    </tbody>
</table>

@endsection
