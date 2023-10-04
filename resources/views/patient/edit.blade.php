@extends('patient.layouts.master')
@section('title', 'create-patient')
@section('content')
    <div class="container">
        <h2>Patient Register</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('patient#update', $patient->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Patient Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $patient->name)}}">
            </div>
            <div class="form-group">
                <label for="email">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" cols="30" rows="10">{{ old('address', $patient->address) }}</textarea>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="">Choose Gender</option>
                    <option value="Male" {{ old('gender', $patient->gender) === 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $patient->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="">Choose Status</option>
                    <option value="normal" {{ old('status', $patient->status) === 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="ill" {{ old('status', $patient->status) === 'ill' ? 'selected' : '' }}>Cold Ill</option>
                    <option value="wound" {{ old('status', $patient->status) === 'wound' ? 'selected' : '' }}>Wound</option>
                    <option value="heavy_injury" {{ old('status', $patient->status) === 'heavy_injury' ? 'selected' : '' }}>Heavy Injury
                    </option>
                    <option value="emergency" {{ old('status', $patient->status) === 'emergency' ? 'selected' : '' }}>Emergency</option>
                </select>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
