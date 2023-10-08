@extends('layouts.dashboard-page')

@section('page')
    <div class="w-full h-full grid grid-cols-6">
        <div class="col-span-2 col-start-2 text-[50px] text-purple font-semibold flex flex-col justify-center">
            <h1>Edit</h1>
            <h1>Clinic</h1>
        </div>
        <div class="col-span-2 col-start-4 self-center bg-gray flex flex-col items-center px-10 py-20 rounded-3xl">
            <h1 class="text-h0 text-purple text-center font-semibold tracking-widest">Clinic Edit</h1>
            <h2 class="text-b2 text-purple my-5">edit {{ $data->value }}</h2>
            <form action="{{ route('admin.clinicUpdate', encrypt($data->id)) }}" method="POST"
                class="w-full flex flex-col gap-3">
                @csrf
                <x-input-field id="clinic-name" name="name" :value="$data->name" placeholder="Clinic Name" color="red" />
                <x-input-field id="clinic-address" name="address" :value="$data->address" placeholder="Clinic Address"
                    color="red" />
                {{-- <x-input-field id="clinic-status" name="clinic-status" :value="$data->status" placeholder="Clinic Status"
                    color="red" /> --}}
                <x-button bgColor="purple" textColor="white" text="Save" />
            </form>

            <a href="{{ route('admin.index') }}" class="w-full border rounded-lg p-2 mt-3 text-center">Cancel</a>

        </div>
    </div>
@endsection
