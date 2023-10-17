@extends('pages.admin-dashboard.layout')
@section('page')
    <div class="h-full flex flex-col justify-start items-center gap-10 m-10 overflow-hidden">
        <div class="w-full mx-10 flex flex-row justify-between items-baseline">
            <div>
                <h1 class="text-h0">Assistant List</h1>
                <h2>View and control all asssistant here</h2>
            </div>
            <div class="w-full md:w-64 flex items-center border border-gray-300 rounded-lg shadow-sm bg-gray">
                <input type="text" placeholder="Search..." class="w-full px-4 py-2 rounded-lg outline-none border-none">
                <button type="submit" class=" text-black px-4 py-2 rounded-lg border-none">
                    <img src="{{ asset('image/search.png') }}" alt="">
                </button>
            </div>

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
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Address
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray">
                                    @if ($assistants->count() > 0)
                                        @foreach ($assistants as $assistant)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{ $assistant->name }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $assistant->email }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $assistant->address }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    <div class="">
                                                        <select
                                                            class="form-select block w-full py-2 pl-3 pr-10 leading-5 rounded-lg shadow-sm border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-300 sm:text-sm">
                                                            <option @if ($assistant->status == 0) selected @endif
                                                                value="0">Pending</option>
                                                            <option @if ($assistant->status == 1) selected @endif
                                                                value="1">Active</option>
                                                            <option @if ($assistant->status == 2) selected @endif
                                                                value="2">Deactive</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                                    <a class="border rounded-lg p-2" href="">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="3">
                                                There is no Assistant
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="my-4">
                                {{ $assistants->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
