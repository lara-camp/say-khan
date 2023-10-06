@extends('doctor.layouts.master')
@section('content')

@if (Session::has('success'))
<div class="alter alert-warning" doctor="alert">
    {{ Session::get('success') }}
</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form action="{{ route('doctor.report.fetch', encrypt(auth()->guard('doctor')->user()->id))}}" method="POST">
    @csrf
    <div class="row ">
        <div class="col-6 offset-1 mb-2">
            <input type="date" name="start_date" class="form-control" value="{{old('start_date')}}" required >
        </div>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="col-6 offset-1 mb-2">
            <input type="date" name="end_date" class="form-control" value="{{old('end_date')}}" required>
        </div>
        <div class="col-6 offset-1 mb-2">
            <select name="clinic_id" id="clinic_id">
                <option value="">All clinic</option>
                @foreach($clinicdoctor['clinicdoctor'] as $clinicdoctors)
                <option value="{{$clinicdoctors->clinic_id}}">{{$clinicdoctors->clinic->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button>Search</button>
    <a href="{{ route('doctor.index')}}" type="button" class="btn btn-danger">Return</a>
</form>


<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Clinic</th>
            <th scope="col">Income</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($reportData))
            @if ($reportData->count() > 0)
            @foreach ($reportData as $data)
            <tr>
                <td class="align-items-center">{{ $loop->iteration }}</td>
                <td class="align-items-center">{{ $data->date }}</td>
                <td class="align-items-center">{{ $data->clinic_name }}</td>
                <td class="align-items-center">{{ $data->total_fees }}</td>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="2">
                    no record
                </td>
            </tr>
            @endif
        @else
        <tr>Blank</tr>
        @endif
    </tbody>
</table>
@endsection