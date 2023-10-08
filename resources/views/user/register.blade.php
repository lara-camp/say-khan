@extends('layouts.master')
@section('title', 'Register')
@section('content')


    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex bg-white h-screen justify-between items-center p-20 w-full   ">
            <div class="flex items-start  justify-around w-full">
                <div class="w-1/3 bg-white flex justify-center items-center flex-col">
                    <div class="shrink-0">
                        <img class="h-52 w-52 object-cover rounded-full border-4 border-purple" src=""
                            alt="" />
                    </div>
                    <div class="p-5 font-bold text-b1 tracking-widest">Upload Profile Picture</div>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file"
                            class="block w-full text-b1 text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-b1 file:font-semibold
                          file:bg-gray file:text-violet-700
                          hover:file:bg-violet-100"
                            accept="image/*" name="image" />
                    </label>
                    @error('image')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-2/3 ">
                    <h1 class="text-h0 font-semibold tracking-widest px-14">Register Here</h1>
                    <div class="w-full  flex justify-between px-5 gap-4">
                        <div class=" w-1/2 flex flex-col py-5 px-4">
                            <input type="text"
                                class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin "
                                id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name...">
                            @error('name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input
                                class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin"
                                type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Enter Email...">
                            @error('email')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="text"
                                class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin "
                                name="phone" id="phone" value="{{ old('phone') }}"
                                placeholder=" Enter Phonenumber..">
                            @error('phone')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input
                                class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin "
                                type="password" name="password" id="password" placeholder="Password">
                            @error('password')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="password"
                                class=" bg-white bg-transparent  border-2 border-purple px-6 rounded-lg h-12 text-b1 w-full tracking-widest font-thin "
                                type="password" name="password_confirmation" id="passwordconfirmation"
                                placeholder="Confirm password">
                            @error('password_confirmation')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class=" w-1/2 flex flex-col py-5 px-4">
                            <select name="role_id" id="roles"
                                class="bg-white  border-2 border-purple mb-5 px-6 h-12 text-gray-900  rounded-lg focus:ring-purple focus:border-purple text-b1 tracking-widest font-thin ">
                                <option value="">Choose One Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @if (old('role_id') == $role->id) selected @endif>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin " value="Active" placeholder="Status" disabled> --}}
                            <textarea id="address" rows="4"
                                class="block py-4  px-6  w-full text-b1 bg-white rounded-lg border-2 border-purple tracking-widest focus:ring-purple focus:border-purple "
                                name="address" placeholder="Enter Address ..">{{ old('address') }}</textarea>
                        </div>
                        {{-- <div class=" w-1/2 flex flex-col py-5 px-4">

                            <select name="role_id" id="roles" class="bg-white  border-2 border-purple mb-5 px-6 h-12 text-gray-900  rounded-lg focus:ring-purple focus:border-purple text-b1 tracking-widest font-thin ">
                    <option value="">Choose One Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if (old('role_id') == $role->id) selected @endif>
                            {{ $role->name }}</option>
                    @endforeach
                </select>

                            <textarea id="address" rows="4"
                                class="block py-4  px-6  w-full text-b1 bg-white rounded-lg border-2 border-purple tracking-widest focus:ring-purple focus:border-purple "
                                name="address" placeholder="Enter Address ..">{{ old('address') }}</textarea>
                        </div> --}}

                    </div>
                    <div class="px-14 ">

                        <span class=" px-2 text-gray "><a href="{{ route('user.create') }}" class=" px-2 text-gray ">Sign
                                In Here</a></span>
                    </div>

                    <div class="px-10 py-5">
                        <button
                            class="bg-purple w-1/2 p-2 rounded-lg text-white font-bold  text-h2 h-10 tracking-widest hover:bg-green "
                            type="submit">Register</button>
                    </div>
                </div>
    </form>
@endsection
