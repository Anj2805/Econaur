@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left Section -->
            <div class="space-y-6">
                <h1 class="text-4xl font-semibold text-[#0d2f2f]">Ready to speak to one of our experts?</h1>
                <p class="text-lg text-[#0d2f2f]">
                    Discover how Econaur can simplify your composting and waste management journey. Whether you're a curious individual, a service provider, or an organization, our experts are here to guide you toward smart, sustainable solutions tailored to your needs.
                </p>
            </div>

            <!-- Right Section -->
            <div class="bg-[#f4f3e6] p-8 rounded-lg">
                <p class="text-xl font-semibold text-[#0d2f2f] mb-8">
                    Once you fill in this form, we'll review your details and connect you with the most relevant product expert based on your needs. Expect a phone call or email within 1–2 business days to schedule your personalized walkthrough and explore how Econaur can support your sustainability goals.
                </p>

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('book-demo.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Name Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="text" name="first_name" id="first_name" required placeholder="First Name" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f] py-3 px-4 text-base">
                        </div>
                        <div>
                            <input type="text" name="last_name" id="last_name" required placeholder="Last Name" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f] py-3 px-4 text-base">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <input type="email" name="email" id="email" required placeholder="Email Address" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f] py-3 px-4 text-base">
                    </div>
                    
                    <!-- Phone Number -->
                    <div>
                        <input type="tel" name="phone" id="phone" placeholder="Phone Number (optional but useful for follow-ups)" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f] py-3 px-4 text-base">
                    </div>

                    <!-- Location -->
                    <div>
                        <input type="text" name="location" id="location" required placeholder="Location (City, State)" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f] py-3 px-4 text-base">
                    </div>

                    <!-- You are -->
                    <div>
                        <label class="block text-sm font-medium text-[#0d2f2f] mb-2">You are:</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="radio" name="user_type" value="individual" id="individual" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="individual" class="ml-2 text-sm text-[#0d2f2f]">Individual (interested in composting)</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="user_type" value="provider" id="provider" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="provider" class="ml-2 text-sm text-[#0d2f2f]">Composting Service Provider</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="user_type" value="educator" id="educator" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="educator" class="ml-2 text-sm text-[#0d2f2f]">Educator/Trainer</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="user_type" value="institution" id="institution" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="institution" class="ml-2 text-sm text-[#0d2f2f]">Institution/Organization</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="user_type" value="municipal" id="municipal" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="municipal" class="ml-2 text-sm text-[#0d2f2f]">Municipal Body</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="user_type" value="other" id="other" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="other" class="ml-2 text-sm text-[#0d2f2f]">Other:</label>
                                <input type="text" name="other_type" class="ml-2 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f] py-3 px-4 text-base">
                            </div>
                        </div>
                    </div>

                    <!-- What are you looking for -->
                    <div>
                        <label class="block text-sm font-medium text-[#0d2f2f] mb-2">What are you looking for?</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" name="interests[]" value="composting_setup" id="composting_setup" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="composting_setup" class="ml-2 text-sm text-[#0d2f2f]">Composting setup at home</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="interests[]" value="learning" id="learning" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="learning" class="ml-2 text-sm text-[#0d2f2f]">Learning about composting</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="interests[]" value="listing" id="listing" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="listing" class="ml-2 text-sm text-[#0d2f2f]">Listing my service</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="interests[]" value="waste_pickup" id="waste_pickup" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="waste_pickup" class="ml-2 text-sm text-[#0d2f2f]">Waste pickup/management service</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="interests[]" value="educational" id="educational" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="educational" class="ml-2 text-sm text-[#0d2f2f]">Educational content or awareness</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="interests[]" value="other_interest" id="other_interest" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="other_interest" class="ml-2 text-sm text-[#0d2f2f]">Other:</label>
                                <input type="text" name="other_interest" class="ml-2 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f] py-3 px-4 text-base">
                            </div>
                        </div>
                    </div>

                    <!-- Preferred Demo Mode -->
                    <div>
                        <label class="block text-sm font-medium text-[#0d2f2f] mb-2">Preferred Demo Mode:</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="radio" name="demo_mode" value="video" id="video" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="video" class="ml-2 text-sm text-[#0d2f2f]">Video call (Google Meet/Zoom)</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="demo_mode" value="phone" id="phone" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="phone" class="ml-2 text-sm text-[#0d2f2f]">Phone call</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="demo_mode" value="pdf" id="pdf" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="pdf" class="ml-2 text-sm text-[#0d2f2f]">Just send me a walkthrough/demo PDF</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="demo_mode" value="not_sure" id="not_sure" class="h-4 w-4 text-[#0d2f2f] focus:ring-[#0d2f2f] border-gray-300">
                                <label for="not_sure" class="ml-2 text-sm text-[#0d2f2f]">Not sure yet</label>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Questions -->
                    <div>
                        <label for="notes" class="block text-sm font-medium text-[#0d2f2f]">Additional Questions or Notes (optional)</label>
                        <textarea name="notes" id="notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f] py-3 px-4 text-base"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" class="bg-[#0d2f2f] text-white px-8 py-4 text-base font-normal rounded-[0.42em] hover:bg-[#d2e526] hover:text-black transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d2f2f] border border-[#0d2f2f]">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 