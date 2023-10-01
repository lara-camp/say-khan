@extends('patient.layouts.master')
@section('title', 'edit-patient')
@section('content')
    <div class="container">
        <h2>Patient Edit</h2>
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
            {{-- @dd($patient) --}}
            @csrf
            <div class="form-group">
                <label for="name">Patient Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $patient->name) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" cols="30" rows="10">{{ old('address', $patient->address) }}</textarea>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender">
                    <option value="">Choose One Option</option>
                    <option value="Male" @if (old('Male', $patient->gender) == 'Male') selected @endif>Male</option>
                    <option value="Female" @if (old('Male', $patient->gender) == 'Female') selected @endif>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="">Choose One Status</option>
                    <option value="normal" @if (old('normal', $patient->status) == 'normal') selected @endif>Normal</option>
                    <option value="ill" @if (old('ill', $patient->status) == 'ill') selected @endif>Cold Ill</option>
                    <option value="wound" @if (old('wound', $patient->status) == 'wound') selected @endif>Wound</option>
                    <option value="heavy_injury" @if (old('heavy_injury', $patient->status) == 'heavy_injury') selected @endif>Heavy Injury</option>
                    <option value="emergency" @if (old('emergency', $patient->status) == 'emergency') selected @endif>Emergency</option>
                </select>
            </div>
            <button type="submit">Update Patient</button>
        </form>
    </div>
@endsection
