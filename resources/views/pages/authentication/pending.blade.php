@extends('layouts.master')
@section('title', 'Pending')
@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Account Pending</h1>
            <p class="mb-4">Your account is pending approval. Please wait for our administrators to review your account.
            </p>
            <p class="mb-4">You can <a href="{{ route('user.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-blue">logout</a> and check back later.</p>

            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                @csrf
                @method('POST') <!-- Add this line to specify the HTTP method -->
            </form>
        </div>
    </div>
@endsection
