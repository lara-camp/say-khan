@extends('Admin.layouts.master')
@section('title', 'FeedBack Show')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="mb-0 ">Role</h1>
        </div>

        @if (Session::has('success'))
            <div class="alter alert-warning" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        {{-- table --}}
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @if ($feedbacks->count() > 0)
                    @foreach ($feedbacks as $feedback)
                        <tr>
                            <td class="align-items-center">{{ $loop->iteration }}</td>
                            <td class="align-items-center">{{ $feedback->remark }}</td>
                            <td class="align-items-center">{{ $feedback->description }}</td>
                            <td class="align-items-center">
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item?')"><a
                                        href="{{ route('feedback_delete', encrypt($feedback->id)) }}"
                                        class="text-white text-decoration-none">Delete</a></button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="2">
                            There is no data.
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>

    </div>
@endsection
