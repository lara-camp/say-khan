@extends('Admin.layouts.master')
@section('title', 'Report')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h1>View Report</h1>
            <div>
                <form action="{{ route('admin.reportSearch') }}" class="d-flex justify-content-between" method="POST">
                    @csrf
                    <input type="date" name="dataSearch" id="" class="form-control">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <div>
                <button class="btn btn-success">PDF View</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Clinic</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Fee</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="">
                            <td scope="row">{{ $data->clinic->name }}</td>
                            <td scope="row">{{ $data->doctor->name }}</td>
                            <td>{{ $data->subscription->plan }}
                                @if ($data->subscription->duration == 3)
                                    (3 months)
                                @elseif ($data->subscription->duration == 6)
                                    (6 months)
                                @else
                                    (A year)
                                @endif
                            </td>
                            <td>{{ $data->subscription->fee + 00 }} ks</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-center h5">Total</td>
                        <td>{{ $totalFee }}ks</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
