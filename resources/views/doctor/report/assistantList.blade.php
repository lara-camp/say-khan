<h2>Assistant List</h2>
@if (Session::has('success'))
    <div class="alter alert-warning" assistant="alert">
        {{ Session::get('success') }}
    </div>
@endif
<form action="{{ route('doctor.report.assistant.fetch', encrypt(auth()->guard('doctor')->user()->id))}}" method="POST">
    @csrf
    <div class="row ">
        <div class="col-6 offset-1 mb-2">
            <select name="clinic_id" id="clinic_id">
                <option value="">All clinic</option>
                @foreach($clinicdoctors['clinicdoctor'] as $clinicdoctor)
                <option value="{{$clinicdoctor->clinic_id}}">{{$clinicdoctor->clinic->name}}</option>
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
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        @if ($assistants['assistant']->count() > 0)
            @foreach ($assistants['assistant'] as $assistant)
                <tr>
                    <td class="align-items-center">{{ $loop->iteration }}</td>
                    <td class="align-items-center">{{ $assistant->clinic->name }}</td>
                    <td class="align-items-center">{{ $assistant->name }}</td>
                    <td class="align-items-center">{{ $assistant->phone }}</td>
                    <td class="align-items-center">{{ $assistant->email }}</td>
                    <td class="align-items-center">{{ $assistant->address }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="2">
                    There is no Assistant
                </td>
            </tr>
        @endif
    </tbody>
</table>
