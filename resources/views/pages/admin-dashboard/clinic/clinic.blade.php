@extends('pages.admin-dashboard.layout')

@section('page')
    <div class="h-full flex flex-col justify-start items-center gap-10 m-10 overflow-hidden">
        <div class="w-full mx-10 flex flex-row justify-between items-baseline">
            <div>
                <h1 class="text-h0">Clinic Form</h1>
                <h2>View and control all clinics here</h2>
            </div>
            <a href="{{ url('/admin/clinic/create') }}"><button
                    class="bg-purple text-white rounded-xl p-3 hover:bg-green">Register
                    clinic</button></a>
        </div>

        <div class="flex flex-col w-full">
            <div class="-m-5 overflow-x-auto">
                <div class="p-5 min-w-full inline-block align-middle">
                    <div class="border border-gray rounded-lg divide-y divide-gray">
                        <div class="overflow-hidden shadow-md">
                            <table class="min-w-full divide-y divide-gray">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Address
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray">
                                    @if ($clinics->count() > 0)
                                        @foreach ($clinics as $clinic)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    <a href="{{ route('admin.clinicDetail') }}">{{ $clinic->name }}</a>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $clinic->address }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                                    <a class="border rounded-lg p-2"
                                                        href="{{ route('admin.clinicEdit', encrypt($clinic->id)) }}">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="3">
                                                There is no clinic
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="py-1 px-4">
                            <nav class="flex items-center space-x-2">
                                <a class="text-gray-400 hover:text-blue-600 p-4 inline-flex items-center gap-2 font-medium rounded-md"
                                    href="#">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="w-10 h-10 bg-blue-500 text-white p-4 inline-flex items-center text-sm font-medium rounded-full"
                                    href="#" aria-current="page">1</a>
                                <a class="w-10 h-10 text-gray-400 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full"
                                    href="#">2</a>
                                <a class="w-10 h-10 text-gray-400 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full"
                                    href="#">3</a>
                                <a class="text-gray-400 hover:text-blue-600 p-4 inline-flex items-center gap-2 font-medium rounded-md"
                                    href="#">
                                    <span class="sr-only">Next</span>
                                    <span aria-hidden="true">»</span>
                                </a>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
