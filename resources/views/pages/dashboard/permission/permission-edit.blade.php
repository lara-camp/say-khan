@extends('layouts.dashboard-page')

@section('page')
    <div class="w-full h-full grid grid-cols-6">
        <div class="col-span-2 col-start-2 text-[50px] text-purple font-semibold flex flex-col justify-center">
            <h1>Edit</h1>
            <h1>Permission</h1>
        </div>
        <div class="col-span-2 col-start-4 self-center bg-gray flex flex-col items-center px-10 py-20 rounded-3xl">
            <h1 class="text-h0 text-purple text-center font-semibold tracking-widest">Permission Register</h1>
            <h2 class="text-b2 text-purple my-5">fill this form to register permission</h2>
            <form action="{{ route('admin.PermissionEdit', $data->id) }}" method="GET" class="w-full flex flex-col gap-3">
                {{-- value should be the data of desired edit id --}}
                <x-input-field id="key" name="key" :value="$data->key" placeholder="" color="red" />
                <x-input-field id="value" name="value" :value="$data->value" placeholder="" color="red" />
                <x-input-field id="status" name="status" :value="$data->status" placeholder="" color="red" />
                <x-button bgColor="purple" textColor="white" text="Save" />
            </form>

            <a href="{{ route('admin.PermissionIndex') }}" class="w-full border rounded-lg p-2 mt-3 text-center">Cancel</a>

        </div>
    </div>
@endsection
