@extends('layouts.dashboard-page')
@section('page')
    <div class="flex bg-white h-screen flex-col justify-center items-center w-full ">
        @if (session('success'))
            <div id="dismiss-alert"
                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 rounded-md p-4 mb-5"
                role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-4 w-4 text-teal-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <div class="text-sm text-teal-800 font-medium">
                            {{ session('success') }}
                        </div>
                    </div>
                    <div class="pl-3 ml-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button"
                                class="inline-flex bg-teal-50 rounded-md p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600"
                                data-hs-remove-element="#dismiss-alert">
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-3 w-3" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M0.92524 0.687069C1.126 0.486219 1.39823 0.373377 1.68209 0.373377C1.96597 0.373377 2.2382 0.486219 2.43894 0.687069L8.10514 6.35813L13.7714 0.687069C13.8701 0.584748 13.9882 0.503105 14.1188 0.446962C14.2494 0.39082 14.3899 0.361248 14.5321 0.360026C14.6742 0.358783 14.8151 0.38589 14.9468 0.439762C15.0782 0.493633 15.1977 0.573197 15.2983 0.673783C15.3987 0.774389 15.4784 0.894026 15.5321 1.02568C15.5859 1.15736 15.6131 1.29845 15.6118 1.44071C15.6105 1.58297 15.5809 1.72357 15.5248 1.85428C15.4688 1.98499 15.3872 2.10324 15.2851 2.20206L9.61883 7.87312L15.2851 13.5441C15.4801 13.7462 15.588 14.0168 15.5854 14.2977C15.5831 14.5787 15.4705 14.8474 15.272 15.046C15.0735 15.2449 14.805 15.3574 14.5244 15.3599C14.2437 15.3623 13.9733 15.2543 13.7714 15.0591L8.10514 9.38812L2.43894 15.0591C2.23704 15.2543 1.96663 15.3623 1.68594 15.3599C1.40526 15.3574 1.13677 15.2449 0.938279 15.046C0.739807 14.8474 0.627232 14.5787 0.624791 14.2977C0.62235 14.0168 0.730236 13.7462 0.92524 13.5441L6.59144 7.87312L0.92524 2.20206C0.724562 2.00115 0.611816 1.72867 0.611816 1.44457C0.611816 1.16047 0.724562 0.887983 0.92524 0.687069Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <form action="{{ route('admin.Update', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex items-start  justify-around w-full">
                <div class="w-1/3 bg-white flex justify-center items-center flex-col">
                    <div class="shrink-0">
                        @if ($admin->image == null)
                            <img class="h-52 w-52 object-cover rounded-full border-4 border-purple"
                                src="{{ asset('image/default_user.jpg') }}" alt="Default Img" id="myImg" />
                        @else
                            <img class="h-52 w-52 object-cover rounded-full border-4 border-purple"
                                src="{{ asset('storage/Admin/' . $admin->image) }}" alt="{{ $admin->image }}"
                                id="myImg" />
                        @endif
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
                            accept="image/*" name="image" onchange="previewImage(event)" id="imageInput" />
                    </label>
                    @error('image')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-2/3 ">
                    <h1 class="text-h0 font-semibold tracking-widest px-14">
                        <span class=" capitalize">{{ $admin->name }}'s</span>
                        Profile
                    </h1>
                    <div class="w-full  flex justify-between px-5 gap-4">
                        <div class=" w-1/2 flex flex-col py-5 px-4">
                            <input type="text"
                                class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin "
                                id="name" name="name" value="{{ old('name', $admin->name) }}"
                                placeholder="Enter Name...">
                            @error('name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input
                                class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin"
                                type="email" id="email" name="email" value="{{ old('email', $admin->email) }}"
                                placeholder="Enter Email...">
                            @error('email')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="text"
                                class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin "
                                name="phone" id="phone" value="{{ old('phone', $admin->phone) }}"
                                placeholder=" Enter Phonenumber..">
                            @error('phone')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class=" w-1/2 flex flex-col py-5 px-4">
                            <textarea id="address" rows="4"
                                class="block py-4  px-6  w-full text-b1 bg-white rounded-lg border-2 border-purple tracking-widest focus:ring-purple focus:border-purple "
                                name="address" placeholder="Enter Address ..">{{ old('address', $admin->address) }}</textarea>
                        </div>
                    </div>
                    <div class="px-10 py-5">
                        <button
                            class="bg-purple w-1/2 p-2 rounded-lg text-white font-bold  text-h2 h-10 tracking-widest hover:bg-green "
                            type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
        <script>
            function previewImage(event) {
                const imageInput = event.target;
                const previewImg = document.getElementById('myImg');
                const img = imageInput.files[0];
                if (img.size <= 2000000) {
                    if (imageInput.files && img) {
                        const reader = new FileReader();

                        reader.onload = function(image) {
                            previewImg.src = image.target.result;
                        };
                        reader.readAsDataURL(img);
                    } else {
                        previewImg.src = "{{ asset('image/default_user.jpg') }}";
                    }
                } else {
                    window.alert("Image size more than 2MB.");
                }
            }
        </script>

    </div>
@endsection
