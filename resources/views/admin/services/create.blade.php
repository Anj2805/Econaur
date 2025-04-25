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
                            Add New Service
                        </h1>
                        <p class="text-xl font-normal text-[#0d2f2f]">
                            Create a new service listing
                        </p>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="bg-[#0d2f2f] text-white px-6 py-3 rounded-lg hover:bg-[#0a2525] transition-colors duration-300">
                        Back to Services
                    </a>
                </div>
            </div>
        </div>

        <!-- Create Form -->
        <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">Service Title</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required></textarea>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" id="price" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                    </div>

                    <div>
                        <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                        <p class="mt-1 text-sm text-gray-500">Enter the category name (e.g., Solar Installation, Energy Audit)</p>
                    </div>

                    <div>
                        <label for="location_name" class="block text-sm font-medium text-gray-700">Location Name</label>
                        <input type="text" name="location_name" id="location_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                        <p class="mt-1 text-sm text-gray-500">Enter the location name (e.g., New York City, Los Angeles)</p>
                    </div>

                    <div>
                        <label for="provider_name" class="block text-sm font-medium text-gray-700">Service Provider Name</label>
                        <input type="text" name="provider_name" id="provider_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" required>
                        <p class="mt-1 text-sm text-gray-500">Enter the service provider's business name</p>
                    </div>

                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700">Service Image</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-[#0d2f2f] file:text-white
                            hover:file:bg-[#0a2525]">
                    </div>

                    <div class="md:col-span-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" class="rounded border-gray-300 text-[#0d2f2f] shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]" checked>
                            <span class="ml-2 text-sm text-gray-600">Active Service</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-[#0d2f2f] text-white px-6 py-3 rounded-lg hover:bg-[#0a2525] transition-colors duration-300">
                        Create Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 