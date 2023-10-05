@extends('layouts.dashboard-page')

@section('page')
    <div class="w-full h-full grid grid-cols-6">
        <div class="col-span-2 col-start-2 text-[50px] text-purple font-semibold flex flex-col justify-center">
            <h1>Edit</h1>
            <h1>Permission</h1>
        </div>
        <div class="col-span-2 col-start-4 self-center bg-gray flex flex-col items-center px-10 py-20 rounded-3xl">
            <h1 class="text-h0 text-purple text-center font-semibold tracking-widest">Permission Edit</h1>
            <h2 class="text-b2 text-purple my-5">edit {{ $data->value }} permission</h2>
            <form action="{{ route('admin.PermissionUpdate', $data->id) }}" method="POST" class="w-full flex flex-col gap-3">
                @csrf
                <x-input-field id="permission-key" name="permission-key" :value="$data->key" placeholder="Permission Key"
                    color="red" />
                <x-input-field id="permission-value" name="permission-value" :value="$data->value"
                    placeholder="Permission Value" color="red" />
                <x-input-field id="permission-status" name="permission-status" :value="$data->status"
                    placeholder="Permission Status" color="red" />
                <x-button bgColor="purple" textColor="white" text="Save" />
            </form>

            <a href="{{ route('admin.PermissionIndex') }}" class="w-full border rounded-lg p-2 mt-3 text-center">Cancel</a>

        </div>
    </div>
@endsection
