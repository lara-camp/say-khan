@extends('doctor.layouts.master')
@section('content')
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
                <td class="align-items-center">{{ $data->total_fees+00 }} kss</td>
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