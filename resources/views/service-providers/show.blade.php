@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Service Provider Details</h2>
            <div class="flex space-x-4">
                @can('update', $serviceProvider)
                    <a href="{{ route('service-providers.edit', $serviceProvider) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Edit Provider
                    </a>
                @endcan
                <a href="{{ route('service-providers.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Business Information</h3>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <span class="text-sm font-medium text-gray-500">Business Name</span>
                                <p class="mt-1 text-sm text-gray-900">{{ $serviceProvider->business_name }}</p>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-500">Description</span>
                                <p class="mt-1 text-sm text-gray-900">{{ $serviceProvider->description }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Contact Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <span class="text-sm font-medium text-gray-500">Email</span>
                                <p class="mt-1 text-sm text-gray-900">{{ $serviceProvider->email }}</p>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-500">Phone</span>
                                <p class="mt-1 text-sm text-gray-900">{{ $serviceProvider->phone }}</p>
                            </div>
                            @if($serviceProvider->website)
                            <div>
                                <span class="text-sm font-medium text-gray-500">Website</span>
                                <p class="mt-1 text-sm text-gray-900">
                                    <a href="{{ $serviceProvider->website }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                        {{ $serviceProvider->website }}
                                    </a>
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Status</h3>
                        <div class="flex items-center">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $serviceProvider->is_verified ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $serviceProvider->is_verified ? 'Verified' : 'Pending Verification' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Business Logo</h3>
                    @if($serviceProvider->logo)
                        <img src="{{ Storage::url($serviceProvider->logo) }}" alt="{{ $serviceProvider->business_name }}" class="w-full h-auto rounded-lg">
                    @else
                        <div class="bg-gray-200 rounded-lg p-4 text-center">
                            <p class="text-gray-500">No logo uploaded</p>
                        </div>
                    @endif
                </div>

                <div class="mt-6 bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Services Offered</h3>
                    @if($serviceProvider->services->count() > 0)
                        <div class="space-y-4">
                            @foreach($serviceProvider->services as $service)
                                <div class="border-b border-gray-200 pb-4">
                                    <h4 class="text-sm font-medium text-gray-900">{{ $service->title }}</h4>
                                    <p class="text-sm text-gray-500">{{ Str::limit($service->description, 100) }}</p>
                                    <a href="{{ route('services.show', $service) }}" class="mt-2 text-sm text-blue-600 hover:text-blue-800">View Details</a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">No services listed yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 