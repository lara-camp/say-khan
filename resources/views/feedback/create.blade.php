<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>
<body>
    <h1>Give Feedback</h1>
    <div class="formSection" stlye="border: 1px solid black;">
        <form action="{{ route('feedback_register') }}" method="POST">
            @csrf
            <input name="doctor_id" type="text" value="{{$id->id}}" hidden>
            <input type="text" value="{{$id->name}}" readonly>
            <h1>What's on your mind?</h1>
            
            <div class="row" style="padding-left: 50px; ">

                <label for="clinic_id">Is this about a Clinic?</label>
                <select name="clinic_id" id="">
                    @foreach($feedbacks['clinicdoctor'] as $clinicdoctor)
                    <option  value="{{$clinicdoctor->clinic_id}}">{{$clinicdoctor->clinic->name}}</option>
                    @endforeach
                </select>

                <label for="remark">Remark</label>
                <input name="remark" type="text" placeholder="Enter Topic of your Feedback">

                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Enter the full Feedback"></textarea>

            </div>
            <button>Submit Feedback</button>
        </form>
    </div>
</body>
</html>