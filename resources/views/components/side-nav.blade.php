<nav class="w-full h-screen flex flex-col p-5 justify-start bg-purple text-gray">
    <h1 class="text-h0 font-semibold">Logo</h1>
    <div class="flex flex-col gap-3 my-10 text-h1">
        <p class="text-b1 mb-3">Management</p>
        <a href="{{ route('admin.index') }}">Clinic</a>
        <a href="">Doctor</a>
        <a href="">Patient</a>
        <a href="{{ route('role.index') }}">Role</a>
        <a href="{{ route('admin.PermissionIndex') }}">Permission</a>
        <x-divider />
    </div>

</nav>
