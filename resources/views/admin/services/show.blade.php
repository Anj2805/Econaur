@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Service Details</h1>
            <a href="{{ route('admin.services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Back to List</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-xl font-semibold mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium">Title</label>
                        <p class="text-gray-900">{{ $service->title }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Description</label>
                        <p class="text-gray-900">{{ $service->description }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Price</label>
                        <p class="text-gray-900">${{ number_format($service->price, 2) }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Status</label>
                        <p class="text-gray-900">{{ $service->is_active ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">Related Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium">Category</label>
                        <p class="text-gray-900">{{ $service->category->name ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Service Provider</label>
                        <p class="text-gray-900">{{ $service->serviceProvider->business_name ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Location</label>
                        <p class="text-gray-900">{{ $service->location->name ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($service->image)
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-4">Service Image</h2>
            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="max-w-md rounded-lg shadow">
        </div>
        @endif

        @if($service->reviews->count() > 0)
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-4">Reviews</h2>
            <div class="space-y-4">
                @foreach($service->reviews as $review)
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-medium">{{ $review->user->name ?? 'Anonymous' }}</p>
                            <p class="text-yellow-500">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </p>
                        </div>
                        <p class="text-gray-500 text-sm">{{ $review->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="mt-2 text-gray-700">{{ $review->comment }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="mt-8 flex space-x-4">
            <a href="{{ route('admin.services.edit', $service) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Edit Service</a>
            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Are you sure you want to delete this service?')">Delete Service</button>
            </form>
        </div>
    </div>
</div>
@endsection 