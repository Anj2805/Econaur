<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemoRequest;
use Illuminate\Http\Request;

class DemoRequestController extends Controller
{
    public function index()
    {
        $demoRequests = DemoRequest::latest()->paginate(10);
        return view('admin.demo-requests.index', compact('demoRequests'));
    }

    public function show(DemoRequest $demoRequest)
    {
        return view('admin.demo-requests.show', compact('demoRequest'));
    }

    public function updateStatus(Request $request, DemoRequest $demoRequest)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,contacted,scheduled,completed,cancelled',
            'scheduled_at' => 'nullable|date',
        ]);

        $demoRequest->update($validated);

        return redirect()->back()->with('success', 'Demo request status updated successfully.');
    }
} 