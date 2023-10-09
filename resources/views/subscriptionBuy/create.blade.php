<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Subscription</title>
</head>
<body>
    <div class="formsection" stlye="border: 1px solid black;">
        <form action="{{ route('clinicSubscription.store') }}" method="POST">
            @csrf
            <h1>Clinic register</h1>
            <div class="row">
                <input name="doctor_id" type="text" placeholder="Enter name" value='{{$id->id}}' hidden>

                <label for="name">Name: </label>
                <input name="name" type="text" placeholder="Enter name" value='{{$id->name}}' readonly>

                <label for="clinic_id">Choose a Clinic to buy for: </label>
                @if ($clinicsubscriptions['clinicdoctor']->count() > 0)
                <select name="clinic_id" id="">
                    @foreach($clinicsubscriptions['clinicdoctor'] as $clinicdoctor)
                        <option value="{{$clinicdoctor->clinic->id}}">{{$clinicdoctor->clinic->name}}</option>
                    @endforeach
                </select>
                @else
                <select readonly>
                    <option>None</option>
                </select>
                @endif
                <label for="subscription_id">Choose Subscription: </label>
                <select name="subscription_id" id="">
                    @foreach($clinicsubscriptions['subscription'] as $subscription)
                    <option value="{{$subscription->id}}">{{$subscription->plan}} . {{$subscription->fee}}</option>
                    @endforeach
                </select>
            </div>
            <button>Buy</button>
            @error('clinic_id')
                    <div class="text-danger">{{ $message }}</div>
            @enderror
        </form>
    </div>

    <table border='1'>
        <tr>
            <th>Doctor Name</th>
            <th>Clinic Name</th>
            <th>Subscription Plan</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </table>


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
</body>
</html>