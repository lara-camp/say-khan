@extends('layouts.dashboard-page')

@section('page')
    <div class="w-full h-full grid grid-cols-6">
        <div class="col-span-2 col-start-2 text-[50px] text-purple font-semibold flex flex-col justify-center">
            <h1>Edit</h1>
            <h1>Clinic</h1>
        </div>
        <div class="col-span-2 col-start-4 self-center bg-gray flex flex-col items-center px-10 py-20 rounded-3xl">
            <h1 class="text-h0 text-purple text-center font-semibold tracking-widest">Clinic Edit</h1>
            <h2 class="text-b2 text-purple mb-10">edit {{ $data->value }} clinic</h2>
            <form action="{{ route('admin.clinicUpdate', encrypt($data->id)) }}" method="POST"
                class="w-full flex flex-col gap-3">
                @csrf
                <label for="clinic-name" class="font-semibold">Clinic Name</label>
                <x-input-field id="clinic-name" name="name" :value="$data->name" placeholder="Clinic Name" color="red" />
                <label for="clinic-address" class="font-semibold">Clinic Address</label>
                <x-input-field id="clinic-address" name="address" :value="$data->address" placeholder="Clinic Address"
                    color="red" />
                {{-- <x-input-field id="clinic-status" name="clinic-status" :value="$data->status" placeholder="Clinic Status"
                    color="red" /> --}}
                <label class="font-semibold">Clinic Status</label>
                <div class="flex items-center ">
                    <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Inactive</label>
                    <input type="checkbox" id="hs-basic-with-description"
                        class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800

                        before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                    <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">Active</label>
                </div>
                <x-divider />
                <x-button bgColor="purple" textColor="white" text="Save" />
            </form>

            <a href="{{ route('admin.index') }}" class="w-full border rounded-lg p-2 mt-3 text-center">Cancel</a>

        </div>
    </div>
@endsection
