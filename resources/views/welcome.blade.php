@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-white overflow-hidden pt-8">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <main class="mt-5 mx-auto max-w-7xl px-4 sm:mt-8 sm:px-6 md:mt-12 lg:mt-16 lg:px-8 xl:mt-20">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-3xl tracking-tight font-extrabold text-[#0d2f2f] sm:text-4xl md:text-5xl">
                        <span class="block">Welcome to Econaur</span>
                        <span class="block text-[#d2e526] mt-3">Your all-in-one platform for composting and waste management solutions.</span>
                    </h1>
                    <p class="mt-3 text-sm text-gray-500 sm:mt-5 sm:text-base sm:max-w-xl sm:mx-auto md:mt-5 md:text-lg lg:mx-0">
                        Discover, connect, and manage eco-friendly services effortlessly. Whether you're an individual, a service provider, or an organization, Econaur empowers you to make sustainable choices with ease. Join our growing community of changemakers driving a cleaner, greener tomorrow.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('services.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[#0d2f2f] hover:bg-[#d2e526] hover:text-black transition-all duration-300 md:py-4 md:text-lg md:px-10">
                                Explore Services
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="{{ route('book-demo') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-[#0d2f2f] bg-gray-100 hover:bg-gray-200 transition-all duration-300 md:py-4 md:text-lg md:px-10">
                                Book a Demo
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('images/welcomeBanner.jpeg') }}" alt="Welcome to Econaur">
    </div>
</div>

<!-- Features Section -->
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-[#0d2f2f] font-semibold tracking-wide uppercase">Features</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Everything you need to manage waste effectively
            </p>
        </div>

        <div class="mt-10">
            <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                <!-- Feature 1 -->
                <div class="relative group">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-[#0d2f2f] text-white group-hover:bg-[#d2e526] group-hover:text-black transition-all duration-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div class="ml-16">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 group-hover:text-[#0d2f2f] transition-colors duration-300">Find Local Services</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Discover composting and waste management services in your area.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="relative group">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-[#0d2f2f] text-white group-hover:bg-[#d2e526] group-hover:text-black transition-all duration-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-16">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 group-hover:text-[#0d2f2f] transition-colors duration-300">Book Demos</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Schedule personalized demos with service providers.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="relative group">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-[#0d2f2f] text-white group-hover:bg-[#d2e526] group-hover:text-black transition-all duration-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                    </div>
                    <div class="ml-16">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 group-hover:text-[#0d2f2f] transition-colors duration-300">Read Reviews</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Make informed decisions with user reviews and ratings.
                        </p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="relative group">
                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-[#0d2f2f] text-white group-hover:bg-[#d2e526] group-hover:text-black transition-all duration-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div class="ml-16">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 group-hover:text-[#0d2f2f] transition-colors duration-300">Quick Setup</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Get started with our easy-to-use platform in minutes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-[#0d2f2f]">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
        <div class="flex flex-col items-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl mb-12 text-center">
                <span class="block">Ready to get started?</span>
                <span class="block text-[#d2e526] mt-2">Join Econaur today.</span>
            </h2>
            <div class="flex space-x-4">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-medium rounded-md text-[#0d2f2f] bg-white hover:bg-[#d2e526] transition-all duration-300">
                    Get started
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="{{ route('book-demo') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-medium rounded-md text-white bg-[#0d2f2f] hover:bg-[#d2e526] hover:text-black transition-all duration-300">
                    Book a demo
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
