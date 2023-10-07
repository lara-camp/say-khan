@extends('patient.layouts.master')
@section('title', 'Home')
@section('content')
<div class="container-fluid">
    <h2>Patient Record List</h2>
    <button type="button" class="btn-create"><a href="{{ route('assistant.index') }}">Home</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patient.home') }}">Patient</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patientDetails.list') }}">Patients Detail</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patientRecords.list', encrypt(auth()->guard('assistant')->user()->id)) }}">Patients Record</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patientRecords.create', encrypt(auth()->guard('assistant')->user()->id)) }}">Create Patients Record </a></button>
    @if ($patientrecords->isEmpty())
    <div class="record">No records found.</div>
    @else
    <table>
        <thead>

            <tr>
                <th>Patient Name</th>
                <th>Body Temp</th>
                <th>Current Situation</th>
                <th>Blood Pressure</th>
                <th>Heart Rate</th>
                <th>Remark</th>
                <th>Weight</th>
                <th>Height</th>
                <th>Total Fee</th>
                <th>Status</th>
                <th>Medical Image 1</th>
                <th>Medical Image 2</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patientrecords as $patientrecord)
            <tr>
                <td>{{ $patientrecord->patient->name }}</td>
                <td>{{ $patientrecord->bodytemp }}</td>
                <td>{{ $patientrecord->currentsituation }}</td>
                <td>{{ $patientrecord->bloodpressure }}</td>
                <td>{{ $patientrecord->heartrate }}</td>
                <td>{{ $patientrecord->remark }}</td>
                <td>{{ $patientrecord->weight }}</td>
                <td>{{ $patientrecord->height }}</td>
                <td>{{ $patientrecord->totalfee }}</td>
                <td>{{ $patientrecord->status }}</td>
                <td><img src="{{ asset($patientrecord->medicalimage1) }}" alt="Medical Image 1" style='width:100px; height:100px'></td>
                <td><img src="{{ asset($patientrecord->medicalimage2) }}" alt="Medical Image 2"style='width:100px; height:100px'></td>
                <td>
                    <button type="button" class="action-btn">
                        <a href="{{ route('patientRecords.edit',encrypt($patientrecord->id)) }}">Edit
                            <img src="{{ asset('assets/img/edit.png') }}" alt=""></a>
                    </button>
                    <button type="button" class="action-btn" onclick="return confirm('are you sure want to delete this items.')">
                        <a href="{{ route('patientRecords.delete', encrypt($patientrecord->id)) }}">Delete
                            <img src="{{ asset('assets/img/delete.png') }}" alt=""></a>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
