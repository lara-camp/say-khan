@extends('patient.layouts.master')
@section('title', 'Edit Detail')
@section('content')
    <div class="container">
        <h2>{{ $patient->patient->name }}'s Record</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('patientDetails#update', $patient->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="blood">Select Blood Type:</label>
                <select name="blood_type" id="blood">
                    <option @if ($patient->blood_type == 'A') selected @endif value="A">A</option>
                    <option @if ($patient->blood_type == 'A+') selected @endif value="A+">A+</option>
                    <option @if ($patient->blood_type == 'B') selected @endif value="B">B</option>
                    <option @if ($patient->blood_type == 'B+') selected @endif value="B+">B+</option>
                    <option @if ($patient->blood_type == 'O') selected @endif value="O">O</option>
                </select>
            </div>
            <div class="form-group">
                <label for="allergic">Allergic:</label>
                <textarea name="allergic" id="address" cols="30" rows="2" required>{{ old('allergic', $patient->allergic) }}</textarea>
            </div>
            <div class="form-group">
                <label for="medicalHistoy">Medical History:</label>
                <textarea name="medical_history" id="medicalHistory" cols="30" rows="2">{{ old('medical_history', $patient->medical_history) }}</textarea>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
