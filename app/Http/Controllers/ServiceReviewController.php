<?php

namespace App\Http\Controllers;

use App\Models\ServiceReview;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = ServiceReview::with(['user', 'service'])->paginate(10);
        return view('service-reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('is_available', true)->get();
        return view('service-reviews.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $validated['user_id'] = Auth::id();

        ServiceReview::create($validated);

        return redirect()->route('service-reviews.index')
            ->with('success', 'Review submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceReview $serviceReview)
    {
        $serviceReview->load(['user', 'service']);
        return view('service-reviews.show', compact('serviceReview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceReview $serviceReview)
    {
        $this->authorize('update', $serviceReview);
        $services = Service::where('is_available', true)->get();
        return view('service-reviews.edit', compact('serviceReview', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceReview $serviceReview)
    {
        $this->authorize('update', $serviceReview);

        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $serviceReview->update($validated);

        return redirect()->route('service-reviews.show', $serviceReview)
            ->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceReview $serviceReview)
    {
        $this->authorize('delete', $serviceReview);
        $serviceReview->delete();

        return redirect()->route('service-reviews.index')
            ->with('success', 'Review deleted successfully.');
    }
}
