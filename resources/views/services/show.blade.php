@extends('layouts.app')

@section('content')
<div class="bg-[#f4f3e6] min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Service Details -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($service->image)
                <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="w-full h-96 object-cover">
            @else
                <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400 text-xl">No image available</span>
                </div>
            @endif

            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-[#0d2f2f] mb-2">{{ $service->title }}</h1>
                        <div class="flex items-center space-x-4 text-gray-600">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                {{ $service->category->name }}
                            </span>
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $service->location->name }}
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-[#0d2f2f]">₹{{ number_format($service->price) }}</div>
                        <div class="text-sm text-gray-600">per {{ $service->price_unit }}</div>
                    </div>
                </div>

                <div class="prose max-w-none mb-8">
                    <h2 class="text-2xl font-semibold text-[#0d2f2f] mb-4">Description</h2>
                    <p class="text-gray-700">{{ $service->description }}</p>
                </div>

                <!-- Service Provider Info -->
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold text-[#0d2f2f] mb-4">Service Provider</h2>
                    <div class="flex items-start">
                        @if($service->serviceProvider->logo)
                            <img src="{{ asset($service->serviceProvider->logo) }}" alt="{{ $service->serviceProvider->business_name }}" class="w-16 h-16 rounded-full mr-4">
                        @else
                            <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                                <span class="text-gray-400 text-sm">No logo</span>
                            </div>
                        @endif
                        <div>
                            <h3 class="text-xl font-semibold text-[#0d2f2f]">{{ $service->serviceProvider->business_name }}</h3>
                            <p class="text-gray-600 mb-2">{{ $service->serviceProvider->description }}</p>
                            <div class="flex items-center space-x-4 text-sm text-gray-600">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    {{ $service->serviceProvider->phone }}
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $service->serviceProvider->email }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                @if($service->reviews->count() > 0)
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-[#0d2f2f] mb-4">Reviews</h2>
                    <div class="space-y-4">
                        @foreach($service->reviews as $review)
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h4 class="font-semibold text-[#0d2f2f]">{{ $review->user->name }}</h4>
                                    <div class="flex items-center text-yellow-500">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <span class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-700">{{ $review->comment }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Related Services -->
                @if($relatedServices->count() > 0)
                <div>
                    <h2 class="text-2xl font-semibold text-[#0d2f2f] mb-4">Related Services</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedServices as $relatedService)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            @if($relatedService->image)
                                <img src="{{ asset($relatedService->image) }}" alt="{{ $relatedService->title }}" class="w-full h-32 object-cover">
                            @else
                                <div class="w-full h-32 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">No image</span>
                                </div>
                            @endif
                            <div class="p-4">
                                <h3 class="font-semibold text-[#0d2f2f] mb-1">{{ $relatedService->title }}</h3>
                                <p class="text-sm text-gray-600 mb-2">₹{{ number_format($relatedService->price) }}</p>
                                <a href="{{ route('services.show', $relatedService) }}" class="text-[#0d2f2f] hover:text-[#0a2525] text-sm font-medium">View Details</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 