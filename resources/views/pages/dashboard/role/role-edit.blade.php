@extends('layouts.dashboard-page')

@section('page')
    <div class="w-full h-full grid grid-cols-6">
        <div class="col-span-2 col-start-2 text-[50px] text-purple font-semibold flex flex-col justify-center">
            <h1>Edit</h1>
            <h1>Role</h1>
        </div>
        <div class="col-span-2 col-start-4 self-center bg-gray flex flex-col items-center px-10 py-20 rounded-3xl">
            <h1 class="text-h0 text-purple text-center font-semibold tracking-widest">Role Edit</h1>
            <h2 class="text-b2 text-purple my-5">edit {{ $role->name }} role</h2>
            <form action="{{ route('role.update', encrypt($role->id)) }}" method="POST" class="w-full flex flex-col gap-3">
                @csrf
                <x-input-field id="role-name" name="role-name" :value="$role->name" placeholder="Role Name" color="red" />
                <x-input-field id="role-type" name="role-type" :value="$role->type" placeholder="Role Type" color="red" />
                <x-input-field id="role-status" name="role-status" :value="$role->status" placeholder="Role Status"
                    color="red" />
                <x-button bgColor="purple" textColor="white" text="Save" />
            </form>

            <a href="{{ route('role.index') }}" class="w-full border rounded-lg p-2 mt-3 text-center">Cancel</a>

        </div>
    </div>
@endsection
