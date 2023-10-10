@extends('layouts.master')
@section('title', 'SayKhan | Admin')

@section('content')
    <div class="grid grid-cols-6 gap-0">
        <x-side-nav class="col-span-1">
            <p class="text-b1 mb-2">Management</p>
            <a href="{{ route('') }}">Patient</a>
        </x-side-nav>
        <div class="w-full bg-white col-span-5 overflow-auto">
            @yield('page')
        </div>
    </div>
@endsection
