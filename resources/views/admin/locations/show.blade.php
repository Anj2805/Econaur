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
                            Location Details
                        </h1>
                        <p class="text-xl font-normal text-[#0d2f2f]">
                            View and manage location information
                        </p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.locations.edit', $serviceLocation->id) }}" class="bg-[#0d2f2f] text-white px-6 py-3 rounded-lg hover:bg-[#0a2525] transition-colors duration-300">
                            Edit Location
                        </a>
                        <a href="{{ route('admin.locations.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors duration-300">
                            Back to Locations
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Location Details -->
        <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-medium text-[#0d2f2f] mb-2">Basic Information</h3>
                    <dl class="grid grid-cols-1 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Location Name</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $serviceLocation->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Service</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $serviceLocation->service->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $serviceLocation->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $serviceLocation->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-[#0d2f2f] mb-2">Address Information</h3>
                    <dl class="grid grid-cols-1 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Address</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $serviceLocation->address }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">City</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $serviceLocation->city }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">State</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $serviceLocation->state }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Postal Code</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $serviceLocation->postal_code }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="md:col-span-2">
                    <h3 class="text-lg font-medium text-[#0d2f2f] mb-2">Description</h3>
                    <p class="text-sm text-gray-900">{{ $serviceLocation->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 