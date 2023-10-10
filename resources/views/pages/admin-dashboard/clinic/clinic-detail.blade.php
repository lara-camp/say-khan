@extends('pages.admin-dashboard.layout')

@section('page')
    <div class="w-full h-full bg-white flex flex-row items-start">
        <div class="w-1/3 bg-gray m-10 rounded-xl flex flex-col items-center p-5">
            <h1>"CLINIC NAME" 's Detail</h1>
            <x-divider />
            <div class="w-full flex flex-col gap-3">
                <p>Clinic Name: data</p>
                <p>Clinic Address: data</p>
                <p>Clinic Status: data(active or inactive)</p>
                <p>Assigned Doctors: doctor count</p>
            </div>
        </div>
        <div class="w-2/3 bg-white m-10">
            <a href="{{ route('admin.assignDoctor') }}"
                class="float-right bg-purple p-2 text-white rounded-xl mb-5 hover:bg-green">
                <button>Assign New Doctor</button>
            </a>
            <div class="flex flex-col w-full">
                <div class="-m-5 overflow-x-auto">
                    <div class="p-5 min-w-full inline-block align-middle">
                        <div class="border border-gray rounded-lg divide-y divide-gray">
                            <div class="overflow-hidden shadow-md">
                                <table class="min-w-full divide-y divide-gray">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Doctor
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Speciality
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray">
                                        {{-- @if ($clinics->count() > 0)
                                            @foreach ($clinics as $clinic) --}}
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                doctor name
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                speciality
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                status
                                            </td>
                                        </tr>
                                        {{-- @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="3">
                                                    There is no clinic
                                                </td>
                                            </tr>
                                        @endif --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
