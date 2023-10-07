<nav class="w-full h-screen flex flex-col p-5 justify-start bg-purple text-gray">
    <h1 class="text-h0 font-semibold">Logo</h1>
    <div class="flex flex-col gap-3 my-10 text-h1">
        <p class="text-b1 mb-3">Management</p>
        <a href="{{ route('admin.clinicIndex') }}">Clinic</a>
        <a href="">Doctor</a>
        <a href="">Patient</a>
        <a href="{{ route('role.index') }}">Role</a>
        <a href="{{ route('admin.PermissionIndex') }}">Permission</a>
        <x-divider />
        <a href="{{ route('admin.index') }}">Profile</a>
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

    </div>

</nav>
