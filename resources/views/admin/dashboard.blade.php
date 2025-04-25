@extends('layouts.app')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-none mx-auto px-6">
        <!-- Header Section -->
        <div class="bg-[#f4f3e6] overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-10 text-gray-900">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-medium text-[#0d2f2f] mb-4 leading-tight font-lato tracking-tight">
                        Admin Dashboard
                    </h1>
                    <p class="text-xl font-normal text-[#0d2f2f]">
                        Manage your platform and monitor activities
                    </p>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <a href="{{ route('admin.users.index') }}" class="block">
                <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300 hover:bg-[#e6e5d8] cursor-pointer">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-[#0d2f2f] rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-sm font-medium text-gray-600">Total Users</h6>
                            <h2 class="text-3xl font-bold text-[#0d2f2f]">{{ $totalUsers }}</h2>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.services.index') }}" class="block">
                <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300 hover:bg-[#e6e5d8] cursor-pointer">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-[#0d2f2f] rounded-full flex items-center justify-center">
                                <i class="fas fa-cogs text-white text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-sm font-medium text-gray-600">Total Services</h6>
                            <h2 class="text-3xl font-bold text-[#0d2f2f]">{{ $totalServices }}</h2>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.demo-requests.index') }}" class="block">
                <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300 hover:bg-[#e6e5d8] cursor-pointer">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-[#0d2f2f] rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-white text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-sm font-medium text-gray-600">Pending Demos</h6>
                            <h2 class="text-3xl font-bold text-[#0d2f2f]">{{ $pendingDemoRequests }}</h2>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.locations.index') }}" class="block">
                <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300 hover:bg-[#e6e5d8] cursor-pointer">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-[#0d2f2f] rounded-full flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-sm font-medium text-gray-600">Locations</h6>
                            <h2 class="text-3xl font-bold text-[#0d2f2f]">{{ $totalLocations }}</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Recent Activity Section -->
        <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300">
            <h2 class="text-2xl font-medium text-[#0d2f2f] mb-6">Recent Activity</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($recentActivities as $activity)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $activity->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $activity->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Completed
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .font-lato {
        font-family: 'Lato', sans-serif;
    }
</style>
@endpush
@endsection 