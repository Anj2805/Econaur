@extends('layouts.app')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-none mx-auto px-6">
        <div class="bg-[#f4f3e6] overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-10 text-gray-900">
                <div class="text-center">
                    <h1 class="text-5xl md:text-6xl font-medium text-[#0d2f2f] mb-8 leading-tight font-['Lato'] tracking-tight">
                        The Operating System for<br>
                        a Greener <span class="italic">Tomorrow</span>.
                    </h1>
                    
                    <div class="p-8 rounded-lg mt-12">
                        <p class="text-xl font-normal text-[#0d2f2f]">
                            Econaur is the digital platform powering the future of composting and waste management<br>
                            revolutionizing how communities reduce, reuse, and regenerate.
                        </p>
                        
                        <div class="flex justify-center gap-6 mt-8">
                            <!-- Book Demo Button -->
                            <a href="{{ route('book-demo') }}" class="bg-[#0d2f2f] text-white px-6 py-3 text-sm font-normal rounded-[0.42em] hover:bg-[#d2e526] hover:text-black transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d2f2f] border border-[#0d2f2f]">
                                BOOK A DEMO
                            </a>

                            <!-- Explore Products Button -->
                            <a href="{{ route('services.index') }}" class="bg-white text-[#0d2f2f] px-6 py-3 text-sm font-normal rounded-[0.42em] hover:bg-gray-50 transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d2f2f] border border-[#0d2f2f]">
                                EXPLORE PRODUCTS
                            </a>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Solutions Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl md:text-4xl font-medium text-[#0d2f2f] text-center mb-12 font-['Lato'] tracking-tight whitespace-nowrap">
            End-to-End Composting & Waste Management Solutions
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- First Box -->
            <div class="bg-[#ded9ff] rounded-lg p-8 hover:shadow-lg transition-all duration-300">
                <p class="text-lg mb-6">Discover composting, waste collection, and educational solutions tailored to your needs.</p>
                <a href="{{ route('services.index') }}" class="inline-flex items-center bg-[#0d2f2f] text-white px-6 py-2 rounded-md hover:bg-[#d2e526] hover:text-black transition-all duration-300">
                    Learn More
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            <!-- Second Box -->
            <div class="bg-[#f4f3e6] rounded-lg p-8 hover:shadow-lg transition-all duration-300">
                <p class="text-lg mb-6">List your composting or waste services and connect with eco-conscious users.</p>
                <a href="{{ route('book-demo') }}" class="inline-flex items-center bg-[#0d2f2f] text-white px-6 py-2 rounded-md hover:bg-[#d2e526] hover:text-black transition-all duration-300">
                    Get Started
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Banner Image Section -->
<div class="w-full bg-white">
    <img src="{{ asset('images/banner.png') }}" alt="Banner" class="w-full h-auto object-cover">
</div>

<!-- Blog Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-medium text-[#0d2f2f] font-['Lato'] tracking-tight">
                Dive into the hottest topics from our experts
            </h2>
            <a href="#" class="bg-[#0d2f2f] text-white px-6 py-3 text-sm font-normal rounded-[0.42em] hover:bg-[#d2e526] hover:text-black transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d2f2f] border border-[#0d2f2f] inline-flex items-center">
                See all
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
        
        <div class="space-y-8">
            <!-- Blog Post 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex">
                    <img src="{{ asset('images/blog1.jpg') }}" alt="Blog Post 1" class="w-1/3 h-64 object-cover">
                    <div class="p-6 w-2/3">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-[#0d2f2f] text-white px-2 py-1 rounded">BLOG</span>
                            <span class="ml-2">Circular Economy</span>
                        </div>
                        <h3 class="text-xl font-semibold text-[#0d2f2f] mb-2">Rethink, Reuse, Revitalise: The Business Case for Compliance</h3>
                        <p class="text-gray-600 mb-4">Embracing environmental compliance can help businesseses gain a competitive edge. Find out how to streamline compliance processes and how regulations differ across industries.</p>
                        <div class="flex justify-between items-center text-sm text-gray-500">
                            <span>August 28, 2024</span>
                            <span>7 min read</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Post 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex">
                    <img src="{{ asset('images/blog2.jpg') }}" alt="Blog Post 2" class="w-1/3 h-64 object-cover">
                    <div class="p-6 w-2/3">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-[#0d2f2f] text-white px-2 py-1 rounded">BLOG</span>
                            <span class="ml-2">Circular Economy</span>
                        </div>
                        <h3 class="text-xl font-semibold text-[#0d2f2f] mb-2">Every Material Matters: Why Incineration Doesn't Support Circularity</h3>
                        <p class="text-gray-600 mb-4">Waste-to-energy incineration is an increasingly popular waste disposal method throughout the EU but at what cost? This article looks at trends, changes in regulations and how this may impact businesses.</p>
                        <div class="flex justify-between items-center text-sm text-gray-500">
                            <span>May 21, 2024</span>
                            <span>5 min read</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Post 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex">
                    <img src="{{ asset('images/blog3.jpg') }}" alt="Blog Post 3" class="w-1/3 h-64 object-cover">
                    <div class="p-6 w-2/3">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-[#0d2f2f] text-white px-2 py-1 rounded">BLOG</span>
                            <span class="ml-2">Circular Economy</span>
                        </div>
                        <h3 class="text-xl font-semibold text-[#0d2f2f] mb-2">What is the 'Right to Repair'? New circular legislation in the EU</h3>
                        <p class="text-gray-600 mb-4">The EU's Right to Repair promotes product durability, reusability, upgradeability, and repairability to encourage a "closed-loop" circular system.</p>
                        <div class="flex justify-between items-center text-sm text-gray-500">
                            <span>April 15, 2024</span>
                            <span>3 min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="py-12 bg-white">
    <div class="max-w-none mx-auto px-6">
        <div class="bg-[#0d2f2f] overflow-hidden shadow-sm sm:rounded-lg my-12">
            <div class="p-10 text-gray-900">
                <h2 class="text-4xl md:text-5xl font-medium text-[#fbfbfb] mb-8 leading-tight font-['Lato'] tracking-tight text-center">
                    Your Digital Hub for a Greener, Circular Future
                </h2>
                
                <p class="text-xl font-normal text-[#fbfbfb] text-center mb-12">
                    Transform the way you manage compost and waste — the sustainable way, with Econaur.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <div class="border-l-4 border-[#d2e526] pl-6">
                        <div class="text-3xl font-bold text-[#fbfbfb]">50K+</div>
                        <div class="text-[#fbfbfb] mt-2">Kgs of organic waste turned into compost through platform-linked efforts</div>
                    </div>
                    <div class="border-l-4 border-[#d2e526] pl-6">
                        <div class="text-3xl font-bold text-[#fbfbfb]">15K+</div>
                        <div class="text-[#fbfbfb] mt-2">Eco-conscious users connected with service providers and educators</div>
                    </div>
                    <div class="border-l-4 border-[#d2e526] pl-6">
                        <div class="text-3xl font-bold text-[#fbfbfb]">1.2K+</div>
                        <div class="text-[#fbfbfb] mt-2">Verified locations actively managing waste digitally</div>
                    </div>
                    <div class="border-l-4 border-[#d2e526] pl-6">
                        <div class="text-3xl font-bold text-[#fbfbfb]">500+</div>
                        <div class="text-[#fbfbfb] mt-2">Composting & waste experts in our growing network</div>
                    </div>
                </div>

                <div class="text-center">
                    <p class="text-2xl font-medium text-[#fbfbfb]">
                        Be part of the change — Join Econaur today!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Final Section -->
<div class="py-16 bg-white">
    <div class="max-w-none mx-auto">
        <div class="text-center mb-12 px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-medium text-[#0d2f2f] mb-6 leading-tight font-['Lato'] tracking-tight whitespace-nowrap">
                The Future of Composting & Waste Management is Circular
            </h2>
            <p class="text-xl text-gray-600 whitespace-nowrap">
                Discover how Econaur can transform the way you manage waste — for a greener, smarter future.
            </p>
            <div class="mt-4 mb-[-13rem] relative z-10">
                <a href="{{ route('book-demo') }}" class="bg-[#0d2f2f] text-white px-8 py-3 text-sm font-normal rounded-[0.42em] hover:bg-[#d2e526] hover:text-black transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d2f2f] border border-[#0d2f2f]">
                    Get Started
                </a>
            </div>
        </div>
        
        <div class="w-full">
            <img src="{{ asset('images/banner5.png') }}" alt="Circular Future" class="w-full h-auto">
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-[#0d2f2f] text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            

            <!-- Middle Links -->
            <div class="flex flex-wrap justify-center gap-8 w-full mb-4 md:mb-0">
                <a href="#" class="hover:text-[#d2e526] transition-colors">About Us</a>
                <a href="#" class="hover:text-[#d2e526] transition-colors">Services</a>
                <a href="#" class="hover:text-[#d2e526] transition-colors">Blog</a>
                <a href="#" class="hover:text-[#d2e526] transition-colors">Contact</a>
                <a href="#" class="hover:text-[#d2e526] transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-[#d2e526] transition-colors">Terms of Service</a>
            </div>

            
        </div>

        <div class="border-t border-gray-700 pt-8">
            <p class="text-center text-sm text-gray-300">
                Making the world greener, one step at a time. Sustainable solutions for a better tomorrow.
            </p>
        </div>
        <!-- Copyright -->
        <div class="text-sm text-gray-300 text-center">
            © 2025 Econaur. All rights reserved.
        </div>
    </div>
</footer>
@endsection
