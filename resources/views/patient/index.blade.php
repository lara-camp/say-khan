@extends('patient.layouts.master')
@section('title', 'Home')
@section('content')
<div class="container-fluid">
    <h2>Patient List</h2>
    <button type="button" class="btn-create"><a href="{{ route('patient#createPage') }}">Patient Create</a></button>
    <button type="button" class="btn-create"><a href="{{ route('patientDetails#list') }}">Patients Detail</a></button>
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
            @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->status }}</td>
                <td>
                    <button type="button" class="action-btn">
                        <a href="{{ route('patient#edit',encrypt($patient->id)) }}">

                            <img src="{{ asset('assets/img/edit.png') }}" alt=""></a>
                    </button>
                    <button type="button" class="action-btn" onclick="return confirm('are you sure want to delete this items.')">
                        <a href="{{ route('patient#delete', encrypt($patient->id)) }}">
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
