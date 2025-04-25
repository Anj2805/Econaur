@extends('layouts.app')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-none mx-auto px-6">
        <!-- Header Section -->
        <div class="bg-[#f4f3e6] overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-10 text-gray-900">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-medium text-[#0d2f2f] mb-4 leading-tight font-lato tracking-tight">
                            Add New User
                        </h1>
                        <p class="text-xl font-normal text-[#0d2f2f]">
                            Create a new user account
                        </p>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="bg-[#0d2f2f] text-white px-6 py-3 rounded-lg hover:bg-[#0a2525] transition-colors duration-300">
                        Back to Users
                    </a>
                </div>
            </div>
        </div>

        <!-- Create Form -->
        <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_admin" class="rounded border-gray-300 text-[#0d2f2f] shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]">
                            <span class="ml-2 text-sm text-gray-600">Admin User</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-[#0d2f2f] text-white px-6 py-3 rounded-lg hover:bg-[#0a2525] transition-colors duration-300">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 