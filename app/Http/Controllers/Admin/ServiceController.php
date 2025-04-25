<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceLocation;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function index()
    {
        // Debug logging
        \Log::info('Loading services for admin index');

        $services = Service::with([
            'category',
            'serviceProvider',
            'location'
        ])->latest()->paginate(10);

        // Debug logging
        \Log::info('Services loaded', [
            'count' => $services->count(),
            'total' => $services->total()
        ]);

        return view('admin.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        $service->load(['category', 'serviceProvider', 'reviews']);
        
        // Debug logging
        Log::info('Service details', [
            'service' => $service->toArray(),
            'category' => $service->category ? $service->category->toArray() : null,
            'provider' => $service->serviceProvider ? $service->serviceProvider->toArray() : null,
            'reviews' => $service->reviews->toArray()
        ]);
        
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::all();
        $locations = ServiceLocation::all();
        $providers = ServiceProvider::all();
        return view('admin.services.edit', compact('service', 'categories', 'locations', 'providers'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:service_categories,id',
            'location_id' => 'required|exists:service_locations,id',
            'provider_id' => 'required|exists:service_providers,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/services'), $imageName);
            $validated['image'] = 'images/services/' . $imageName;
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        $locations = ServiceLocation::all();
        $providers = ServiceProvider::all();
        
        return view('admin.services.create', compact('categories', 'locations', 'providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_name' => 'required|string|max:255',
            'location_name' => 'required|string|max:255',
            'provider_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        // Find or create category
        $category = ServiceCategory::firstOrCreate(
            ['name' => $request->category_name],
            [
                'slug' => Str::slug($request->category_name),
                'description' => $request->category_name . ' services',
                'is_active' => true
            ]
        );

        // Find or create location
        $location = ServiceLocation::firstOrCreate(
            ['name' => $request->location_name],
            [
                'address' => $request->location_name,
                'city' => $request->location_name,
                'state' => 'NA',
                'country' => 'USA',
                'is_active' => true
            ]
        );

        // Find or create provider
        $provider = ServiceProvider::firstOrCreate(
            ['business_name' => $request->provider_name],
            [
                'description' => $request->provider_name . ' services',
                'is_verified' => true,
                'is_active' => true
            ]
        );

        // Create the service
        $service = new Service([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $category->id,
            'location_id' => $location->id,
            'service_provider_id' => $provider->id,
            'is_active' => $request->boolean('is_active', true)
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/services'), $imageName);
            $service->image = 'images/services/' . $imageName;
        }

        $service->save();

        // Debug logging
        \Log::info('Service created', [
            'service_id' => $service->id,
            'title' => $service->title,
            'category_id' => $service->category_id,
            'location_id' => $service->location_id,
            'provider_id' => $service->service_provider_id
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }
} 