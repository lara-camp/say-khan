@extends('Admin.layouts.master')
@section('title','Role-Lists')
@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0 ">Role</h1>
        <a href="{{ route('role.create') }}" class="btn btn-primary">Add Role</a>
    </div>

    @if(Session::has('success'))
    <div class="alter alert-warning" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    {{-- table --}}
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @if ($roles->count() >0)
            @foreach ($roles as $role)
            <tr>
                <td class="align-items-center">{{$loop->iteration}}</td>
                <td class="align-items-center">{{$role->name}}</td>
                <td class="align-items-center">{{$role->type}}</td>
                <td class="align-items-center">{{$role->status}}</td>
                <td class="align-items-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('role.edit',encrypt($role->id))}}" type="button" class="btn btn-danger">Edit</a>

                        <form method="post" action="{{route('role.destroy',encrypt($role->id))}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary" onclick="return confirm('i want to delete this')" alt="">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="2">
                    There is no role
                </td>
            </tr>
            @endif

        </tbody>
    </table>

</div>

@endsection
