
<table border='1'>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @forelse( as )
    <tr>
        <td>{{$}}</td>
        <td>{{$}}</td>
        <td>{{$}}</td>
        <td>{{$}}</td>
        <td>{{$}}</td>
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