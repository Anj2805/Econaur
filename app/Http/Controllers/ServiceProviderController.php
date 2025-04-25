<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceProviders = ServiceProvider::with('user')->paginate(10);
        return view('service-providers.index', compact('serviceProviders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service-providers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('service-provider-logos', 'public');
            $validated['logo'] = $path;
        }

        ServiceProvider::create($validated);

        return redirect()->route('service-providers.index')
            ->with('success', 'Service provider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceProvider $serviceProvider)
    {
        $serviceProvider->load(['user', 'services']);
        return view('service-providers.show', compact('serviceProvider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        $this->authorize('update', $serviceProvider);
        return view('service-providers.edit', compact('serviceProvider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        $this->authorize('update', $serviceProvider);

        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            if ($serviceProvider->logo) {
                Storage::disk('public')->delete($serviceProvider->logo);
            }
            $path = $request->file('logo')->store('service-provider-logos', 'public');
            $validated['logo'] = $path;
        }

        $serviceProvider->update($validated);

        return redirect()->route('service-providers.show', $serviceProvider)
            ->with('success', 'Service provider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceProvider $serviceProvider)
    {
        $this->authorize('delete', $serviceProvider);

        if ($serviceProvider->logo) {
            Storage::disk('public')->delete($serviceProvider->logo);
        }

        $serviceProvider->delete();

        return redirect()->route('service-providers.index')
            ->with('success', 'Service provider deleted successfully.');
    }
}
