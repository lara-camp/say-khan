<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Subscription</title>
</head>
<body>
    <div class="formsection" stlye="border: 1px solid black;">
        <form action="{{ route('buy_subscription_register') }}" method="POST">
            @csrf
            <h1>Clinic register</h1>
            <div class="row">
                <label for="name">Name: </label>
                <input name="name" type="text" placeholder="Enter name" value=''>

                <label for="clinic_id">Choose a Clinic to buy for: </label>
                <select name="clinic_id" id="">
                    @forelse($subscriptions as $id)
                    <option value="{{->}}">{{ }} . {{ }}</option>
                    @empty

                    @endforelse
                </select>

                <label for="subscription_id">Choose Subscription: </label>
                <select name="subscription_id" id="">
                    @foreach($subscriptions as $id)
                    <option value="{{}}">{{}} . {{}}</option>
                    @endforeach
                </select>
            </div>
            <button>Buy</button>
        </form>
    </div>

    <table border='1'>
        @forelse($ as $)
        <tr>
            <th>Doctor Name</th>
            <th>For which Clinic</th>
            <th>Subscription Type</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>{{$doctor->name}}</td>
            <td>{{$clinic->name}}</td>
            <td>{{$id->subscription->plan}}</td>
            <td>{{$id->subscription->duration}}</td>
        </tr>
        <form id="delete_form_{{ $id->id }}" action="/buy/{{encrypt($id->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Cancel</button>
        </form>
        @empty
        <p>No Ongoing Request</p>
        @endforelse
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