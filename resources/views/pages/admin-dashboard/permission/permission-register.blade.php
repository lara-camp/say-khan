@extends('pages.admin-dashboard.layout')

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
                @csrf
                <x-input-field id="permission-key" name="permission-key" value="" placeholder="Enter Permission Key"
                    color="red" />
                <x-input-field id="permission-value" name="permission-value" value=""
                    placeholder="Enter Permission Value" color="red" />
                <x-button bgColor="purple" textColor="white" text="Register" />
            </form>
            <a href="{{ url('/admin/permission') }}" class="w-full underline text-blue text-right pt-5">view permission</a>
        </div>
    </div>
@endsection
