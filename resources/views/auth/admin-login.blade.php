@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-2 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-[#0d2f2f]">Admin Portal</h2>
            <p class="text-gray-600 mt-2">Please sign in to continue</p>
        </div>

        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember" class="inline-flex items-center">
                    <input id="remember" type="checkbox" name="remember" class="rounded border-gray-300 text-[#0d2f2f] shadow-sm focus:border-[#0d2f2f] focus:ring focus:ring-[#0d2f2f] focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('login') }}" class="text-sm text-[#0d2f2f] hover:text-[#d2e526]">
                    <i class="fas fa-arrow-left mr-1"></i> Back to User Login
                </a>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#0d2f2f] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#d2e526] hover:text-black focus:bg-[#d2e526] active:bg-[#d2e526] focus:outline-none focus:ring-2 focus:ring-[#0d2f2f] focus:ring-offset-2 transition ease-in-out duration-150">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 