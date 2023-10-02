
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
            <form id="" action="{{route('clinic_subscription_accept', encrypt($clinicsubscription->id))}}" method="POST">
                @csrf
                @method('PUT')
                <button>Accept</button>
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