@extends('layouts.dashboard-page')

@section('page')
    <div class="w-full h-full grid grid-cols-6">
        <div class="col-span-2 col-start-2 text-[50px] text-purple font-semibold flex flex-col justify-center">
            <h1>register</h1>
            <h1>now</h1>
        </div>
        <div class="col-span-2 col-start-4 self-center bg-gray flex flex-col items-center px-10 py-20 rounded-3xl">
            <h1 class="text-h0 text-purple font-semibold tracking-widest">Clinic Register</h1>
            <h2 class="text-b2 text-purple mb-10">fill this form to register Clinic</h2>
            <form action="{{ route('admin.clinicStore') }}" method="POST" class="w-full flex flex-col gap-3">
                @csrf
                <label for="clinic-name">Clinic Name</label>
                <x-input-field id="clinic-name" name="name" value="" placeholder="Enter Clinic Name"
                    color="red" />
                <label for="clinic-address">Clinic Address</label>
                <x-input-field id="clinic-address" name="address" value="" placeholder="Enter Clinic Address"
                    color="red" />
                <x-button bgColor="purple" textColor="white" text="Register" />
            </form>
            <a href="{{ route('admin.index') }}" class="w-full underline text-blue text-right pt-5">view clinics</a>
        </div>
    </div>
@endsection
