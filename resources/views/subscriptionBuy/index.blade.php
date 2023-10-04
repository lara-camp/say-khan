
<table border='1'>
        <tr>
            <th>Doctor Name</th>
            <th>Clinic Name</th>
            <th>Subscription Plan</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @forelse($clinicsubscriptions['clinicsubscription'] as $clinicsubscription)
        <tr>
            <td>{{$clinicsubscription->doctor->name}}</td>
            <td>{{$clinicsubscription->clinic->name}}</td>
            <td>{{$clinicsubscription->subscription->plan}}</td>
            <td>{{$clinicsubscription->subscription->duration}}</td>
            <td>{{$clinicsubscription->status}}</td>
            <td>
            <form id="" action="{{route('clinic_subscription_update', encrypt($clinicsubscription->id))}}" method="POST">
                @csrf
                @method('PUT')
                <select name="status" id="">
                    <option value='1'>Pending</option>
                    <option value='2'>Active</option>
                    <option value='3'>Disable</option>
                </select>
                <button>Confirm</button>
            </form>
            <form id="delete_form_{{ $clinicsubscription->id }}" action="{{route('clinic_subscription_delete', encrypt($clinicsubscription->id))}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
            </td>
        </tr>

        @empty
        <p>No requests</p>
        @endforelse
    </table>
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