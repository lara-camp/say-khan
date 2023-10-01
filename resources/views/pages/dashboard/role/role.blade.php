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
                                @if ($roles->count() > 0)
                                    @foreach ($roles as $role)
                                        <tr class="divide-x-8 divide-[#DED9E2]">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $role->name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">
                                                {{ $role->type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="post"
                                                    action="{{ route('role.destroy', encrypt($role->id)) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="return confirm('i want to delete this')"
                                                        alt="">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="3">
                                            There is no role
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a class="absolute bottom-24 right-10 bg-purple text-white p-3 rounded-xl hover:bg-green"
            href="{{ url('/admin/role/create') }}">Register
            Role</a>
    </div>
@endsection
