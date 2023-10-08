@extends('patient.layouts.master')
@section('title', 'Detail Create')
@section('content')
<div class="container">
    <h2>Patient Detail</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('patientDetails.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="patientId">Select Patient:</label>
            <select name="patient_id" id="patientId">
                <option value="">Choose Patient</option>
                @foreach ($patients as $patient)
                <option value="{{ $patient->id }}" @if($patient->id == old('patient_id')) selected @endif>{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="blood">Select Blood Type:</label>
            <select name="blood_type" id="blood">
                <option value="">Choose Blood Type</option>
                <option value="A" @if(old('blood_type')=="A" ) selected @endif>A</option>
                <option value="A+" @if(old('blood_type')=="A+" ) selected @endif>A+</option>
                <option value="B" @if(old('blood_type')=="B" ) selected @endif>B</option>
                <option value="B+" @if(old('blood_type')=="B+" ) selected @endif>B+</option>
                <option value="O" @if(old('blood_type')=="O" ) selected @endif>O</option>
            </select>
        </div>
        <div class="form-group">
            <label for="allergic">Allergic:</label>
            <textarea name="allergic" id="address" cols="30" rows="2">{{ old('allergic') }}</textarea>
        </div>
        <div class="form-group">
            <label for="medicalHistoy">Medical History:</label>
            <textarea name="medical_history" id="medicalHistory" cols="30" rows="2">{{ old('medical_history') }}</textarea>
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
