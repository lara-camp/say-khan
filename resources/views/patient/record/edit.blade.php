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
        <form action="{{ route('patientRecords#update',$patientrecord->id) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <!-- demo data -->
            <div class="form-group">
                <input type="number" id="assistant_id" name="assistant_id" value="{{ old('assistant_id', $patientrecord->assistant_id) }}" hidden>
            </div>
            <div class="form-group">
                <input type="number" id="patient_id" name="patient_id" value="{{ old('patient_id', $patientrecord->patient_id) }}" hidden >
            </div>
            <div class="form-group">
                <label for="name">Patient Name:</label>
                <input type="text" id="name" name="name" value="{{ $patientrecord->patient->name }}">
            </div>
            <!--  -->
            <div class="form-group">
                <label for="bodytemp">Body Temp:</label>
                <input type="text" id="bodytemp" name="bodytemp" value="{{ old('bodytemp', $patientrecord->bodytemp) }}">
            </div>
            <div class="form-group">
                <label for="currentsituation">Current Situation:</label>
                <textarea name="currentsituation" id="currentsituation" cols="30" rows="10">{{ old('currentsituation', $patientrecord->currentsituation) }}</textarea>
            </div>
            <div class="form-group">
                <label for="bloodpressure">Blood Pressure:</label>
                <input type="number" id="bloodpressure" name="bloodpressure" value="{{ old('bloodpressure', $patientrecord->bloodpressure) }}">
            </div>
            <div class="form-group">
                <label for="heartrate">Heart Rate:</label>
                <input type="number" id="heartrate" name="heartrate" value="{{ old('heartrate', $patientrecord->heartrate) }}">
            </div>
            <div class="form-group">
                <label for="remark">Remark:</label>
                <textarea name="remark" id="remark" cols="30" rows="10">{{ old('remark', $patientrecord->remark) }}</textarea>
            </div>
            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight" value="{{ old('weight', $patientrecord->weight) }}">
            </div>
            <div class="form-group">
                <label for="height">Height:</label>
                <input type="number" id="height" name="height" value="{{ old('height', $patientrecord->height) }}">
            </div>
            <div class="form-group">
                <label for="totalfee">Total Fee:</label>
                <input type="number" id="totalfee" name="totalfee" value="{{ old('totalfee', $patientrecord->totalfee) }}">
            </div>
            <div class="form-group">
                <label for="medicalimage1">Medical Image 1:</label>
                <input type="file" id="medicalimage1" name="medicalimage1">
            </div>
            <div class="form-group">
                <label for="medicalimage2">Medical Image 2:</label>
                <input type="file" id="medicalimage2" name="medicalimage2">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="">Choose Status</option>
                    <option value="normal" {{ old('status', $patientrecord->status) === 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="ill" {{ old('status', $patientrecord->status) === 'ill' ? 'selected' : '' }}>Cold Ill</option>
                    <option value="wound" {{ old('status', $patientrecord->status) === 'wound' ? 'selected' : '' }}>Wound</option>
                    <option value="heavy_injury" {{ old('status', $patientrecord->status) === 'heavy_injury' ? 'selected' : '' }}>Heavy Injury</option>
                    <option value="emergency" {{ old('status', $patientrecord->status) === 'emergency' ? 'selected' : '' }}>Emergency</option>
                </select>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
