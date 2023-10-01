@extends('layouts.dashboard-page')

@section('page')
    <div class="h-full flex flex-col justify-start items-center gap-10">
        <h1 class="text-h0">Role Form</h1>
        <div class="w-5/6 flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border-2 rounded-lg overflow-hidden border-purple">
                        <table class="min-w-full divide-y-4 divide-[#DED9E2]">
                            <thead>
                                <tr class="divide-x-8 divide-[#DED9E2]">
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Role Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Type</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="divide-x-8 divide-[#DED9E2]">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800 dark:text-gray-200">
                                        role1
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">
                                        role1
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                                    </td>
                                </tr>

                                <tr class="divide-x-8 divide-[#DED9E2]">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800 dark:text-gray-200">
                                        role2
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">
                                        role2
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                                    </td>
                                </tr>

                                <tr class="divide-x-8 divide-[#DED9E2]">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800 dark:text-gray-200">
                                        role3
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">
                                        role3adfasdf</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a class="absolute bottom-24 right-10 bg-purple text-white p-3 rounded-xl hover:bg-green"
            href="{{ url('/role/register') }}">Register
            Role</a>
    </div>
@endsection
