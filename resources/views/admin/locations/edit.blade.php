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
                            Edit Location
                        </h1>
                        <p class="text-xl font-normal text-[#0d2f2f]">
                            Update location information
                        </p>
                    </div>
                    <a href="{{ route('admin.locations.index') }}" class="bg-[#0d2f2f] text-white px-6 py-3 rounded-lg hover:bg-[#0a2525] transition-colors duration-300">
                        Back to Locations
                    </a>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300">
            <form action="{{ route('admin.locations.update', $serviceLocation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Location Name</label>
                        <input type="text" name="name" id="name" value="{{ $serviceLocation->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label for="service_id" class="block text-sm font-medium text-gray-700">Service</label>
                        <select name="service_id" id="service_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                            <option value="">Select a Service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ $serviceLocation->service_id == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" value="{{ $serviceLocation->address }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="city" id="city" value="{{ $serviceLocation->city }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                        <input type="text" name="state" id="state" value="{{ $serviceLocation->state }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                        <input type="text" name="postal_code" id="postal_code" value="{{ $serviceLocation->postal_code }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]">{{ $serviceLocation->description }}</textarea>
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" class="rounded border-gray-300 text-[#0d2f2f] shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" {{ $serviceLocation->is_active ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600">Active Location</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-[#0d2f2f] text-white px-6 py-3 rounded-lg hover:bg-[#0a2525] transition-colors duration-300">
                        Update Location
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 