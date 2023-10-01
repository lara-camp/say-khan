@extends('layouts.master')
@section('title', 'SayKhan | Admin')

@section('content')
    <div class="grid grid-cols-5 gap-0">
        <x-side-nav class="col-span-1" />
        @yield('page-layout')
    </div>
@endsection
