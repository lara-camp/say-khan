@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex w-full h-screen justify-center bg-purple flex-col items-center">
      <div class=" max-w-md w-auto min-w-fit">
        <div class="flex justify-center">
          <h1 class="font-bold text-h1 py-2 text-white ">Welcome</h1> 
        </div>
        <div class="w-80  mb-5 min-w-fit">
          <div class="py-2">
            <div class="absolute">
              <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none" class="my-1.5 mx-5">
                <path d="M17.4167 0C8.02505 0 0.402832 7.75289 0.402832 17.3056C0.402832 26.8582 8.02505 34.6111 17.4167 34.6111C26.8084 34.6111 34.4306 26.8582 34.4306 17.3056C34.4306 7.75289 26.8084 0 17.4167 0ZM9.02887 28.1734C9.76047 26.6159 14.2181 25.0931 17.4167 25.0931C20.6153 25.0931 25.09 26.6159 25.8046 28.1734C23.4907 30.0424 20.5813 31.15 17.4167 31.15C14.2521 31.15 11.3428 30.0424 9.02887 28.1734ZM28.2376 25.6641C25.8046 22.653 19.9007 21.6319 17.4167 21.6319C14.9327 21.6319 9.02887 22.653 6.59589 25.6641C4.86047 23.3452 3.80561 20.4552 3.80561 17.3056C3.80561 9.67381 9.9136 3.46111 17.4167 3.46111C24.9198 3.46111 31.0278 9.67381 31.0278 17.3056C31.0278 20.4552 29.973 23.3452 28.2376 25.6641ZM17.4167 6.92222C14.116 6.92222 11.4619 9.62189 11.4619 12.9792C11.4619 16.3364 14.116 19.0361 17.4167 19.0361C20.7174 19.0361 23.3716 16.3364 23.3716 12.9792C23.3716 9.62189 20.7174 6.92222 17.4167 6.92222ZM17.4167 15.575C16.0046 15.575 14.8646 14.4155 14.8646 12.9792C14.8646 11.5428 16.0046 10.3833 17.4167 10.3833C18.8289 10.3833 19.9688 11.5428 19.9688 12.9792C19.9688 14.4155 18.8289 15.575 17.4167 15.575Z" fill="#EEEEEE"/>
              </svg>
            </div>
            <input type="text" placeholder="Username"  class="w-full h-12 bg-purple bg-transparent border-2 border-white p-4 pl-20 text-b1  tracking-widest rounded-xl focus:border-black placeholder-white">
          </div>
          <div class="py-2">
            <div class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="42" viewBox="0 0 41 42" fill="none" class="my-0.5 mx-5">
              <g clip-path="url(#clip0_293_17)">
              <path d="M30.6251 14.1139H28.9237V10.6528C28.9237 5.87644 25.1126 2 20.4168 2C15.7209 2 11.9098 5.87644 11.9098 10.6528V14.1139H10.2084C8.33691 14.1139 6.80566 15.6714 6.80566 17.575V34.8806C6.80566 36.7842 8.33691 38.3417 10.2084 38.3417H30.6251C32.4966 38.3417 34.0279 36.7842 34.0279 34.8806V17.575C34.0279 15.6714 32.4966 14.1139 30.6251 14.1139ZM15.3126 10.6528C15.3126 7.78006 17.5925 5.46111 20.4168 5.46111C23.2411 5.46111 25.5209 7.78006 25.5209 10.6528V14.1139H15.3126V10.6528ZM30.6251 34.8806H10.2084V17.575H30.6251V34.8806ZM20.4168 29.6889C22.2883 29.6889 23.8196 28.1314 23.8196 26.2278C23.8196 24.3242 22.2883 22.7667 20.4168 22.7667C18.5452 22.7667 17.014 24.3242 17.014 26.2278C17.014 28.1314 18.5452 29.6889 20.4168 29.6889Z" fill="#EEEEEE"/>
              </g>
              <defs>
              <clipPath id="clip0_293_17">
              <rect width="40.8333" height="41.5333" rx="10" fill="white"/>
              </clipPath>
              </defs>
            </svg>
            </div>
            <input type="password" placeholder="Password"  class="w-full h-12 bg-purple bg-transparent border-2 border-white p-4 pl-20 text-b1 tracking-widest rounded-xl focus:border-black placeholder-white">
          </div>
          <div class="py-2">
            <button class="w-full h-12  bg-blue text-white text-b4 font-bold rounded-xl focus:border-black">Login</button>
          </div>
          <div class="py-1  ">
            <h1 class="float-right text-white text-b2">Forgot Password?</h1>
          </div>
        </div>
        <div class=" bg-white h-1 ">
        </div>
        <div class=" my-1">
          <div class="py-2">
            <div class="absolute">
              <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none" class="my-2 mx-5">
                <g clip-path="url(#clip0_293_40)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M37.9999 19.4222C37.9999 17.8599 37.8706 16.7199 37.5907 15.5378H19.3877V22.5888H30.0724C29.8571 24.3411 28.6938 26.9799 26.1087 28.7532L26.0725 28.9893L31.8279 33.3588L32.2266 33.3978C35.8887 30.0834 37.9999 25.2067 37.9999 19.4222Z" fill="#4285F4"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3877 38C24.6223 38 29.0167 36.3111 32.2267 33.3978L26.1087 28.7532C24.4715 29.8721 22.2742 30.6533 19.3877 30.6533C14.2607 30.6533 9.90932 27.3389 8.35811 22.7578L8.1308 22.7768L2.14616 27.3157L2.06787 27.5289C5.25603 33.7355 11.8049 38 19.3877 38Z" fill="#34A853"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.35805 22.7578C7.94882 21.5757 7.71186 20.3089 7.71186 19.0001C7.71186 17.6911 7.9487 16.4245 8.33653 15.2423L8.32571 14.9904L2.26616 10.3786L2.06793 10.471C0.753911 13.0466 0 15.9388 0 18.9999C0 22.0611 0.754028 24.9531 2.06793 27.5287L8.35817 22.7577" fill="#FBBC04"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3877 7.34662C23.0283 7.34662 25.4839 8.88779 26.8843 10.1757L32.3559 4.94008C28.9955 1.87895 24.6223 0.000114441 19.3877 0.000114441C11.8049 0.000114441 5.25615 4.26452 2.06787 10.4711L8.33659 15.2424C9.90932 10.6613 14.2607 7.34674 19.3877 7.34674" fill="#EA4335"/>
                </g>
                <defs>
                <clipPath id="clip0_293_40">
                <rect width="38" height="38" fill="white"/>
                </clipPath>
                </defs>
              </svg>
            </div>
            <input type="text" placeholder="Sign In With Google"  class="w-full h-14 bg-purple bg-transparent border-2 border-white p-4 pl-20  tracking-widest rounded-xl focus:border-black placeholder-white">
          </div>
          <div class="py-2">
            <div class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none" class="my-2 mx-5">
              <g clip-path="url(#clip0_293_34)">
              <path d="M36.6666 19.6667C36.6666 10.4667 29.1999 3 19.9999 3C10.7999 3 3.33325 10.4667 3.33325 19.6667C3.33325 27.7333 9.06659 34.45 16.6666 36V24.6667H13.3333V19.6667H16.6666V15.5C16.6666 12.2833 19.2833 9.66667 22.4999 9.66667H26.6666V14.6667H23.3333C22.4166 14.6667 21.6666 15.4167 21.6666 16.3333V19.6667H26.6666V24.6667H21.6666V36.25C30.0833 35.4167 36.6666 28.3167 36.6666 19.6667Z" fill="#F7F4EA"/>
              </g>
              <defs>
              <clipPath id="clip0_293_34">
              <rect width="40" height="40" fill="white"/>
              </clipPath>
              </defs>
            </svg>
            </div>
            <div class="w-full h-14 bg-purple bg-transparent border-2 border-white p-4 pl-20  tracking-widest rounded-xl ">
                Sign In With Facebook
            </div>
            <!-- <input type="none" placeholder="Sign In With Facebook"  class="w-full h-14 bg-purple bg-transparent border-2 border-white p-4 pl-20  tracking-widest rounded-xl focus:border-black placeholder-white"> -->
          </div>
          
        </div>
        <div class="py-1 flex justify-center items-center gap-2 ">
            <h1 class=" text-gray text-b2 ">No Account? </h1>
            <a href="" class="text-b2">Create One</a>
        </div>
      </div>

@endsection