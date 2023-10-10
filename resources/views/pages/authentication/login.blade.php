@extends('layouts.master')
@section('title', 'Login')
@section('content')


    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <div class="flex w-full h-screen justify-center bg-purple flex-col items-center">
        <div class=" max-w-md w-auto min-w-fit">
            <div class="flex justify-center">
                <h1 class="font-semibold text-h0 py-2 text-white ">Welcome</h1>
            </div>

            <form class="login-form" action="{{ route('users.create') }}" method="POST">
                @csrf
                <div class="w-80  mb-5 min-w-fit">
                    <div class="py-2">
                        <div class="absolute my-1.5 mx-5">
                            <img src="{{ url('/assets/icons/Account circle.svg') }}" alt="">
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required
                            class="w-full bg-transparent border-2 font-thin border-white p-4 pl-20 text-b1  tracking-widest rounded-xl focus:border-black placeholder-white">
                        @error('email')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="py-2">
                        <div class="absolute my-1.5 mx-5">
                            <img src="{{ url('/assets/icons/Lock.svg') }}" alt="">
                        </div>
                        <input type="password" placeholder="Password" name="password" required
                            class="w-full bg-transparent outline-none border-2 border-white p-4 pl-20 text-b1 tracking-widest rounded-xl focus:border-black placeholder-white">
                        @error('password')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- <div class="py-1 w-full">
                        <a class="text-gray float-right text-b2" href="">Forgot password?</a>
                    </div> --}}
                    <button class="w-full h-12 my-2 bg-blue text-white text-h1 font-semibold rounded-xl focus:border-black">
                        Login
                    </button>
                    {{-- <div class="py-1  ">
					<h1  @error('password_confirmation')
						<small style="color: red">{{ $message }}</small>
						 @enderror>Forgot Password?</h1>
				</div> --}}

            </form>

        </div>

        <div class="bg-white h-0.5 ">
        </div>
        <div class=" my-1">
            <a href="{{ route('user#roleSelect', ['provider' => 'google']) }}">
                <x-icon-button action="{{ route('user#roleSelect', ['provider' => 'google']) }}"
                    icon="{{ url('/assets/icons/Google.svg') }}" text="Sign In With Google" bgColor="purple"
                    textColor="white" />
            </a>
            <a href="{{ route('user#roleSelect', ['provider' => 'facebook']) }}">
                <x-icon-button action="{{ route('user#roleSelect', ['provider' => 'facebook']) }}"
                    icon="{{ url('/assets/icons/Facebook.svg') }}" text="Sign In With Facebook" bgColor="purple"
                    textColor="white" />
            </a>
            <div class="py-1 w-full">
                <p class="text-gray text-center text-b1">
                    No account?
                    <a class="text-white" href="{{ route('user.create') }}">Create One</a>
                </p>
            </div>
        </div>

    </div>
    </div>
    <Script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0)
        window.onunload = function(){null;}
    </Script>
@endsection


