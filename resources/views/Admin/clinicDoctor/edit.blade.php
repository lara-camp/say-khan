<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="" stlye="border: 1px solid black;">
        <form id= "update_form" action="{{ route('clinicDoctor.update', $id->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1>Clinic Doctor Edit</h1>
            <div class="row">
                <label for="">Current Clinic Name: </label>
                <input name="clinic_name_display" type="text" value="{{$id->clinic->name}}" readonly>
                <label for="">Current Doctor Name: </label>
                <input name="doctor_name_display" type="text" value="{{$id->doctor->name}}" readonly>
                <label for="">Current status: </label>
                <input name="status_display" type="text" value="{{$id->status}}" readonly>

            </div>
            <br>
            <div class="row">

                <label for="">Save Clinic Name as: </label>
                <select name="clinic_id" id="" >
                    @foreach($clinicdoctors['clinic'] as $clinic)
                    <option  value="{{$clinic->id}}">{{$clinic->name}}</option>
                    @endforeach
                </select>

                <label for="">Save Doctor Name as: </label>
                <select name="doctor_id" id="">
                    @foreach($clinicdoctors['doctor'] as $doctor)
                    <option  value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                </select>

                <label for="">Save Status as: </label>
                <select name="status" id="">
                    <option  value="Active">Active</option>
                    <option  value="Inactive">Inactive</option>
                    <option  value="Disabled">Disabled</option>
                </select>
            </div>
            <button>Save Changes</button>
        </form>
        <button><a href="{{ route('clinicDoctor.index')}}">Cancel</a>
    </div>
</body>
</html>

<script>
    const form = document.getElementById('update_form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to save changes?')) {
            form.submit();
        } else {

        }
    });
</script>