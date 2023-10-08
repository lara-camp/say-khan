
    <div class="w-full h-full grid grid-cols-6">
        <div class="col-span-2 col-start-2 text-[50px] text-purple font-semibold flex flex-col justify-center">
            <h1>Change</h1>
            <h1>Password</h1>
        </div>
        <div class="col-span-2 col-start-4 self-center bg-gray flex flex-col items-center px-10 py-20 rounded-3xl">
            <h1 class="text-h0 text-purple text-center font-semibold tracking-widest">Change Password</h1>
            <h2 class="text-b2 text-purple my-5">fill this form to change password</h2>
            @if (session('success'))
                <h4 class="text-green py-3">{{ session('success') }}</h4>
            @endif
            <form action="{{ route('doctor.changePassword') }}" method="POST" class="w-full flex flex-col gap-3">
                @csrf
                <input type="password"
                    class="w-full bg-white bg-transparent  border-2 border-purple px-6 rounded-lg h-12 text-b1 tracking-widest font-thin"
                    name="oldPassword" placeholder="Enter Old Password...">
                @error('oldPassword')
                    <small class=" text-green">{{ $message }}</small>
                @enderror
                <input type="password"
                    class="w-full bg-white bg-transparent  border-2 border-purple px-6 rounded-lg h-12 text-b1 tracking-widest font-thin"
                    name="newPassword" placeholder="Enter New Password...">
                @error('newPassword')
                    <small class=" text-green">{{ $message }}</small>
                @enderror
                <input type="password"
                    class="w-full bg-white bg-transparent  border-2 border-purple px-6 rounded-lg h-12 text-b1 tracking-widest font-thin"
                    name="newPasswordConfirm" placeholder="Enter New Password Confirm...">
                @error('newPasswordConfirm')
                    <small class=" text-green">{{ $message }}</small>
                @enderror
                <x-button bgColor="purple" textColor="white" text="Change" />
            </form>
        </div>
    </div>
