<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Econaur</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-none mx-auto px-8">
                <div class="flex flex-row justify-between items-center h-24 relative z-[1]">
                    <!-- Logo and Platform Solutions -->
                    <div class="flex items-center space-x-12">
                        <!-- Logo -->
                        <div class="flex-shrink-0 py-2">
                            <a href="{{ route('home') }}" class="block">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-[50px] w-auto">
                            </a>
                        </div>

                        <!-- Platform Solutions Dropdown -->
                        <div class="hidden lg:flex space-x-8">
                            <!-- Platform Dropdown -->
                            <div class="relative group">
                                <button class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-semibold flex items-center">
                                    PLATFORM
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="absolute left-0 mt-2 w-96 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                    <div class="p-6">
                                        <div class="mb-6">
                                            <div class="flex items-start space-x-4">
                                                <div class="flex-shrink-0">
                                                    <svg class="w-6 h-6 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Digital waste management</h3>
                                                    <p class="text-sm text-gray-600">Change the way your business manages waste for good</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="flex items-start space-x-4">
                                                <div class="flex-shrink-0">
                                                    <svg class="w-6 h-6 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Circularity solutions</h3>
                                                    <p class="text-sm text-gray-600">Take-back and recycling systems that return valuable materials to the production cycle</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex items-start space-x-4">
                                                <div class="flex-shrink-0">
                                                    <svg class="w-6 h-6 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Recycler solutions</h3>
                                                    <p class="text-sm text-gray-600">All-in-one platform for recyclers, their subcontractors and their customers</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Solutions Dropdown -->
                            <div class="relative group">
                                <button class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-semibold flex items-center">
                                    SOLUTIONS
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="absolute left-1/2 transform -translate-x-1/2 mt-2 w-[800px] bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                    <div class="p-8">
                                        <div class="flex flex-row space-x-8">
                                            <!-- Departments Section -->
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-[#0d2f2f] mb-4">Departments</h3>
                                                <div class="space-y-3">
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                                        </svg>
                                                        <span>Sustainability</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                        </svg>
                                                        <span>Procurement</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                        </svg>
                                                        <span>Leadership</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                        <span>Waste Operations</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span>Finance</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Industries Section -->
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-[#0d2f2f] mb-4">Industries</h3>
                                                <div class="space-y-3">
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                        <span>Manufacturing</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                                        </svg>
                                                        <span>Construction</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                                        </svg>
                                                        <span>Retail</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                        <span>Hospitals and Clinics</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span>Airports</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Use Cases Section -->
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-[#0d2f2f] mb-4">Use Cases</h3>
                                                <div class="space-y-3">
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                                        </svg>
                                                        <span>Automation</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span>Cost Optimisation</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                                        </svg>
                                                        <span>Compliance</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span>CO2 Optimisation</span>
                                                    </a>
                                                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                        <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                        </svg>
                                                        <span>Recycling Rate Optimisation</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Resources Dropdown -->
                            <div class="relative group">
                                <button class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-semibold flex items-center">
                                    RESOURCES
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="absolute left-0 mt-2 w-96 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                    <div class="p-6">
                                        <div class="mb-6">
                                            <h3 class="text-lg font-semibold text-gray-500 mb-4">Knowledge Centre</h3>
                                            <div class="space-y-3">
                                                <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                    <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                                    </svg>
                                                    <span>Blog</span>
                                                </a>
                                                <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                    <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <span>Webinars</span>
                                                </a>
                                                <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                    <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <span>Events</span>
                                                </a>
                                                <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                    <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                    </svg>
                                                    <span>Guides and Reports</span>
                                                </a>
                                                <a href="#" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-md">
                                                    <svg class="w-5 h-5 text-[#0d2f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                    <span>Case Studies</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-semibold">SERVICES</a>
                            
                            <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-semibold">COMPANY</a>
                        </div>
                    </div>

                    <!-- Right Side Buttons -->
                    <div class="hidden lg:flex items-center space-x-8">
                        <!-- Book Demo Button -->
                        @unless(Route::is('welcome') || Route::is('admin.login'))
                            <a href="{{ route('book-demo') }}" class="bg-[#0d2f2f] text-white px-6 py-2.5 text-sm font-medium rounded-md hover:bg-[#d2e526] hover:text-black transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d2f2f]">
                                BOOK A DEMO
                            </a>
                        @endunless

                        @guest
                            <!-- Login Button -->
                            @unless(Route::is('login') || Route::is('register'))
                                <a href="{{ route('login') }}" class="text-[#0d2f2f] hover:text-[#d2e526] px-4 py-2 text-sm font-medium transition-all duration-300">
                                    Login
                                </a>
                                <!-- Signup Button -->
                                <a href="{{ route('register') }}" class="bg-[#0d2f2f] text-white px-6 py-2.5 text-sm font-medium rounded-md hover:bg-[#d2e526] hover:text-black transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d2f2f]">
                                    Sign Up
                                </a>
                            @endunless
                        @endguest

                        <!-- Profile Dropdown -->
                        @auth
                            <div class="relative group">
                                <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </button>
                                <div class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                    <div class="p-4">
                                        <div class="mb-4">
                                            <h3 class="text-lg font-semibold text-gray-900">{{ Auth::user()->name }}</h3>
                                            <p class="text-sm text-gray-600">Welcome! To access account and manage</p>
                                        </div>
                                        <div class="border-t border-gray-100 pt-2">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                                    Logout
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="lg:hidden">
                        <button type="button" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @if (session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
