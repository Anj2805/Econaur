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
                            Users Management
                        </h1>
                        <p class="text-xl font-normal text-[#0d2f2f]">
                            Manage all users in the system
                        </p>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="bg-[#0d2f2f] text-white px-6 py-3 rounded-lg hover:bg-[#0a2525] transition-colors duration-300">
                        Add New User
                    </a>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_admin ? 'bg-[#0d2f2f] text-white' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->email_verified_at ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-[#0d2f2f] hover:text-[#0a2525] mr-3">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 