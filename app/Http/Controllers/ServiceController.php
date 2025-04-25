<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        \Log::info('Filter request received', [
            'category' => $request->category,
            'location' => $request->location,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'search' => $request->search
        ]);

        $query = Service::with(['category', 'serviceProvider', 'location'])
            ->where('is_active', true)
            ->where('is_available', true);

        // Filter by category
        if ($request->has('category') && $request->category) {
            \Log::info('Applying category filter', ['category' => $request->category]);
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by location
        if ($request->has('location') && $request->location) {
            \Log::info('Applying location filter', ['location' => $request->location]);
            $query->whereHas('location', function($q) use ($request) {
                $q->where('id', $request->location);
            });
        }

        // Filter by price range
        if ($request->has('min_price') && $request->min_price) {
            \Log::info('Applying min price filter', ['min_price' => $request->min_price]);
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price) {
            \Log::info('Applying max price filter', ['max_price' => $request->max_price]);
            $query->where('price', '<=', $request->max_price);
        }

        // Search by title or description
        if ($request->has('search') && $request->search) {
            \Log::info('Applying search filter', ['search' => $request->search]);
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $services = $query->latest()->paginate(12);
        $categories = ServiceCategory::where('is_active', true)->get();
        $locations = ServiceLocation::where('is_active', true)->get();

        \Log::info('Query results', ['count' => $services->count()]);

        return view('services.index', compact('services', 'categories', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ServiceCategory::where('is_active', true)->get();
        $locations = ServiceLocation::where('is_active', true)->get();
        return view('services.create', compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'location_id' => 'required|exists:service_locations,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'price_unit' => 'required|string|max:50',
            'is_available' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get the authenticated user's service provider ID
        $serviceProvider = Auth::user()->serviceProvider;
        if (!$serviceProvider) {
            return back()->with('error', 'You must be a service provider to create services.');
        }

        $validated['service_provider_id'] = $serviceProvider->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->title) . '-' . time() . '.' . $image->getClientOriginalExtension();
            
            // Store the image in the public/images/services directory
            $path = $image->storeAs('public/images/services', $filename);
            
            // Add the full storage path to the validated data
            $validated['image'] = 'storage/images/services/' . $filename;
        }

        Service::create($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        if (!$service->is_active || !$service->is_available) {
            abort(404);
        }

        $service->load(['category', 'serviceProvider', 'location', 'reviews.user']);
        
        // Get related services
        $relatedServices = Service::where('category_id', $service->category_id)
            ->where('id', '!=', $service->id)
            ->where('is_active', true)
            ->where('is_available', true)
            ->take(4)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $this->authorize('update', $service);
        $categories = ServiceCategory::where('is_active', true)->get();
        return view('services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $validated = $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'price_unit' => 'required|string|max:50',
            'is_available' => 'boolean'
        ]);

        $service->update($validated);

        return redirect()->route('services.show', $service)
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
