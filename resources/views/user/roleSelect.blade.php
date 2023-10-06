@extends('patient.layouts.master')
@section('title', 'Role Select')
@section('content')
    <div class="container">
        <h2>Select Role</h2>
        <form action="{{ route('user#socialPage') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="roles">Role:</label>
                <input type="hidden" value="{{ $social }}" name="socialKey">
                <select name="role_id" id="roles">
                    <option value="">Choose One Role</option>
                    @foreach ($roles as $role)
                        @if ($role->name !== 'Admin')
                            <option value="{{ $role->id }}" @if (old('role_id') == $role->id) selected @endif>
                                {{ $role->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('role_id')
                    <small style="color:red">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
