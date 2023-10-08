@extends('patient.layouts.master')
@section('title', 'Home')
@section('content')
<div class="container-fluid">
    <h2>Patient List</h2>
    <button type="button" class="btn-create"><a href="{{ route('assistant.index', encrypt($assistant->id)) }}">Home</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patient.list', encrypt($assistant->id)) }}">Patient</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patientDetails.list', encrypt($assistant->id)) }}">Patients Detail</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patientRecords.list', encrypt($assistant->id)) }}">Patients Record</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patient.create') }}">Create Patient</a></button>
    @if ($patients->isEmpty())
    <div class="record">No records found.</div>
    @else
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($patients))
                @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->address }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->status }}</td>
                    <td>
                        <button type="button" class="action-btn">
                            <a href="{{ route('patient.edit',encrypt($patient->id)) }}">Edit
                                <img src="{{ asset('assets/img/edit.png') }}" alt=""></a>
                        </button>
                        <button type="button" class="action-btn" onclick="return confirm('are you sure want to delete this items.')">
                            <a href="{{ route('patient.delete', encrypt($patient->id)) }}">Delete
                                <img src="{{ asset('assets/img/delete.png') }}" alt=""></a>
                        </button>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>Blank</tr>
            @endif
        </tbody>
    </table>
    @endif
</div>
@endsection
