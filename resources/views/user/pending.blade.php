@extends('layouts.master')
@section('title', 'Pending')
@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Account Pending</h1>
            <p class="mb-4">Your account is pending approval. Please wait for our administrators to review your account.
            </p>
            <p class="mb-4">You can <a href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-blue">logout</a> and check
                back later.</p>
            <form id="logout-form" action="#" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endsection
