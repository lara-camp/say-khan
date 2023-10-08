<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="" stlye="border: 1px solid black;">
        <h2>All record of Clinics and Doctors</h2>
        <a href="{{ route('clinicDoctor.create') }}">Add Clinic Doctor</a>
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Clinic Name</th>
                <th>Doctor Name</th>
                <th>Status</th>
                <th>Date created</th>
                <th>Date Modified</th>
                <th>Action</th>
            </tr>
            @foreach($clinicdoctors['clinicdoctor'] as $id)
            <tr>
                <td>{{$id->id}}</td>
                <td>{{$id->clinic->name}}</td>
                <td>{{$id->doctor->name}}</td>
                <td>{{$id->status}}</td>
                <td>{{$id->created_at}}</td>
                <td>{{$id->updated_at}}</td>
                <td><button><a href="{{ route('clinicDoctor.edit', encrypt($id->id)) }}">Edit</a></button>
                    <form id="delete_form_{{ $id->id }}" action="{{ route('clinicDoctor.delete', encrypt($id->id)) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    
    </div>
</body>
</html>

<script>
    const deleteForms = document.querySelectorAll('[id^="delete_form_"]');
    deleteForms.forEach((form) => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this instance?')) {
                form.submit();
            } else {
                
            }
        });
    });
</script>