@extends('patient.layouts.master')
@section('title', 'Detail List')
@section('content')
    <div class="container-fluid">
        {{-- @dd($patients) --}}
        <h2>Patient Details</h2>
        <button type="button" class="btn-create"><a href="{{ route('patient#home') }}">Patient</a></button>
        <button type="button" class="btn-create"><a href="{{ route('patientDetails#list') }}">Patients Detail</a></button>
        <button type="button" class="btn-create"><a href="{{ route('patientRecords#list') }}">Patients Record</a></button>
        <button type="button" class="btn-create"><a href="{{ route('patientDetails#createPage') }}">Create Details</a></button>
        @if ($patients->isEmpty())
            <div class="record">No records found.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>blood_type</th>
                        <th>Allergic</th>
                        <th>Medical History</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $p)
                        <tr>
                            <td>{{ $p->patient->name }}</td>
                            <td>{{ $p->patient->phone }}</td>
                            <td>{{ $p->blood_type }}</td>
                            <td>{{ $p->allergic }}</td>
                            <td>{{ $p->medical_history }}</td>
                            <td>
                                <button type="button" class="action-btn">
                                    <a href="{{ route('patientDetails#edit', encrypt($p->id)) }}">Edit
                                        <img src="{{ asset('assets/img/edit.png') }}" alt=""></a>
                                </button>
                                <button type="button" class="action-btn"
                                    onclick="return confirm('are you sure want to delete this items.')">
                                    <a href="{{ route('patientDetail#delete', encrypt($p->id)) }}">Delete
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
