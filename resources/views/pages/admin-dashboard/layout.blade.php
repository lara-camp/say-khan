@extends('layouts.master')
@section('title', 'SayKhan | Admin')

@section('content')
    <div class="grid grid-cols-6 gap-0">
        <x-side-nav class="col-span-1">
            <h3 class="mb-2">Welcome, {{ auth()->guard('admin')->user()->name }}</h3>
            <p class="text-b1 mb-2">Management</p>
            <a href="{{ route('admin.index') }}">Clinic</a>
            <a href="{{ route('doctor.index') }}">Doctor</a>
            <a href="{{ route('admin.assistantList') }}">Assistant</a>
            <a href="{{ route('role.index') }}">Role</a>
            <a href="{{ route('admin.PermissionIndex') }}">Permission</a>
            <x-divider />
            <p class="text-b1 mb-2">Account</p>
            <a href="{{ route('admin.profile') }}">Profile</a>
            <a href="{{ route('admin.changePasswordPage') }}">Change Password</a>
            @if (auth()->guard('admin')->check() ||
                    auth()->guard('assistant')->check() ||
                    auth()->guard('doctor')->check())
                <a href="#" onclick="confirmLogout()">Logout</a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                    @method('POST') <!-- Add this line to specify the HTTP method -->
                </form>

                <script>
                    function confirmLogout() {
                        if (confirm('Are you sure you want to logout?')) {
                            document.getElementById('logout-form').submit();
                        }
                    }
                </script>
            @endif
        </x-side-nav>
        <div class="w-full bg-white col-span-5 overflow-auto">
            @yield('page')
        </div>
    </div>
@endsection
