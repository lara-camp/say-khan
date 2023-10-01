@extends('Admin.layouts.master')
@section('title','Create')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Create Role Permission</h2>
            <form action="{{ route('rolePermission.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select form-select" name="role_id" id="role">
                        <option value="">Choose One Role</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="permission" class="form-label">Permission</label>
                    <select class="form-select form-select" name="permission_id" id="permission">
                        <option value="">Choose One Permission </option>
                        @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->value }}</option>
                        @endforeach
                    </select>
                    @error('permission_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

</div>
@endsection
