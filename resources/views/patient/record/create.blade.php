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
        <form action="{{ route('patientRecords#create') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <!-- demo data -->
            <div class="form-group">
                <label for="assistant_id">Assistant id:</label>
                <input type="number" id="assistant_id" name="assistant_id" >
            </div>
            <div class="form-group">
                <label for="patient_id">Patient id:</label>
                <select name="patient_id" id="patient_id">
                    @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <!--  -->
            <div class="form-group">
                <label for="bodytemp">Body Temp:</label>
                <input type="text" id="bodytemp" name="bodytemp" value="{{ old('bodytemp') }}">
            </div>
            <div class="form-group">
                <label for="currentsituation">Current Situation:</label>
                <textarea name="currentsituation" id="currentsituation" cols="30" rows="10">{{ old('currentsituation') }}</textarea>
            </div>
            <div class="form-group">
                <label for="bloodpressure">Blood Pressure:</label>
                <input type="number" id="bloodpressure" name="bloodpressure" value="{{ old('bloodpressure') }}">
            </div>
            <div class="form-group">
                <label for="heartrate">Heart Rate:</label>
                <input type="number" id="heartrate" name="heartrate" value="{{ old('heartrate') }}">
            </div>
            <div class="form-group">
                <label for="remark">Remark:</label>
                <textarea name="remark" id="remark" cols="30" rows="10">{{ old('remark') }}</textarea>
            </div>
            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight" value="{{ old('heartrate') }}">
            </div>
            <div class="form-group">
                <label for="height">Height:</label>
                <input type="number" id="height" name="height" value="{{ old('heartrate') }}">
            </div>
            <div class="form-group">
                <label for="totalfee">Total Fee:</label>
                <input type="number" id="totalfee" name="totalfee" value="{{ old('totalfee') }}">
            </div>
            <div class="form-group">
                <label for="medicalimage1">Medical Image 1:</label>
                <input type="file" id="medicalimage1" name="medicalimage1" value="{{ old('medicalimage1') }}">
            </div>
            <div class="form-group">
                <label for="medicalimage2">Medical Image 2:</label>
                <input type="file" id="medicalimage2" name="medicalimage2" value="{{ old('medicalimage2') }}">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="">Choose Status</option>
                    <option value="normal" {{ old('status') === 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="ill" {{ old('status') === 'ill' ? 'selected' : '' }}>Cold Ill</option>
                    <option value="wound" {{ old('status') === 'wound' ? 'selected' : '' }}>Wound</option>
                    <option value="heavy_injury" {{ old('status') === 'heavy_injury' ? 'selected' : '' }}>Heavy Injury</option>
                    <option value="emergency" {{ old('status') === 'emergency' ? 'selected' : '' }}>Emergency</option>
                </select>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
