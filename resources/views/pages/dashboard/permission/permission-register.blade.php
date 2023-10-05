@extends('layouts.dashboard-page')

@section('page')
    <div class="w-full h-full grid grid-cols-6">
        <div class="col-span-2 col-start-2 text-[50px] text-purple font-semibold flex flex-col justify-center">
            <h1>register</h1>
            <h1>now</h1>
        </div>
        <div class="col-span-2 col-start-4 self-center bg-gray flex flex-col items-center px-10 py-20 rounded-3xl">
            <h1 class="text-h0 text-purple text-center font-semibold tracking-widest">Permission Register</h1>
            <h2 class="text-b2 text-purple my-5">fill this form to register permission</h2>
            <form action="{{ route('role.store') }}" method="POST" class="w-full flex flex-col gap-3">
                <x-input-field id="role-name" name="role-name" value="" placeholder="Enter Permission Name" color="red" />
                <x-input-field id="role - type" name="role - type" value="" placeholder="Enter Type" color="red" />
                <x-button bgColor="purple" textColor="white" text="Register" />
            </form>
            <a href="{{ url('/admin/permission') }}" class="w-full underline text-blue text-right pt-5">view permission</a>
        </div>
    </div>
@endsection
