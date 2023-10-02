<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Doctor register</title>
</head>
<body>

    <h1>This is clinic doctor page</h1>
    <div class="formsection" stlye="border: 1px solid black;">
        <form action="{{ route('clinic_doctor_register') }}" method="POST">
            @csrf
            <h1>Clinic Doctor register</h1>
            <div class="row">
                <label for="clinic_id">Clinic Name: </label>
                <select name="clinic_id" id="" required>
                    @foreach($clinicdoctors['clinic'] as $clinic)
                    <option  value="{{$clinic->id}}">{{$clinic->name}}</option>
                    @endforeach
                </select>

                <label for="doctor_id">Doctor Name: </label>
                <select name="doctor_id"  id="" required>
                    @foreach($clinicdoctors['doctor'] as $doctor)
                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                </select>

                <label for="status">Status: </label>
                <select name="status" id="">
                    <option  value="Active">Active</option>
                    <option  value="Inactive">Inactive</option>
                    <option  value="Disabled">Disabled</option>
                </select>

            </div>
            <button>Register</button>
        </form>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-danger">
                {{ session('success') }}
            </div>
        @endif
    </div>



</body>
</html>