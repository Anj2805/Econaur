<?php

namespace App\Http\Controllers;

use App\Models\ServiceLocation;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = ServiceLocation::with('service')->paginate(10);
        return view('admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('is_available', true)->get();
        return view('admin.locations.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'is_primary' => 'boolean'
        ]);

        if ($validated['is_primary']) {
            ServiceLocation::where('service_id', $validated['service_id'])
                ->update(['is_primary' => false]);
        }

        ServiceLocation::create($validated);

        return redirect()->route('admin.locations.index')
            ->with('success', 'Service location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceLocation $serviceLocation)
    {
        return view('admin.locations.show', compact('serviceLocation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceLocation $serviceLocation)
    {
        $this->authorize('update', $serviceLocation);
        $services = Service::where('is_available', true)->get();
        return view('admin.locations.edit', compact('serviceLocation', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceLocation $serviceLocation)
    {
        $this->authorize('update', $serviceLocation);

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'is_primary' => 'boolean'
        ]);

        if ($validated['is_primary']) {
            ServiceLocation::where('service_id', $validated['service_id'])
                ->where('id', '!=', $serviceLocation->id)
                ->update(['is_primary' => false]);
        }

        $serviceLocation->update($validated);

        return redirect()->route('admin.locations.show', $serviceLocation)
            ->with('success', 'Service location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceLocation $serviceLocation)
    {
        $this->authorize('delete', $serviceLocation);
        $serviceLocation->delete();

        return redirect()->route('admin.locations.index')
            ->with('success', 'Service location deleted successfully.');
    }
}
