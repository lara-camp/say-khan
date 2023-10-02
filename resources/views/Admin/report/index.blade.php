@extends('Admin.layouts.master')
@section('title', 'Report')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h1>View Report</h1>
            <div>
                <button class="btn btn-success">PDF View</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Column 1</th>
                        <th scope="col">Column 2</th>
                        <th scope="col">Column 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">R1C1</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                    <tr class="">
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
