<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Service;
use App\Models\DemoRequest;
use App\Models\ServiceLocation;
use App\Models\Activity;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalServices = Service::count();
        $pendingDemoRequests = DemoRequest::where('status', 'pending')->count();
        $totalLocations = ServiceLocation::count();
        $recentActivities = Activity::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalServices',
            'pendingDemoRequests',
            'totalLocations',
            'recentActivities'
        ));
    }

    public function verifyProvider(ServiceProvider $provider)
    {
        $provider->update(['is_verified' => true]);
        return redirect()->back()->with('success', 'Service provider has been verified.');
    }

    public function unverifyProvider(ServiceProvider $provider)
    {
        $provider->update(['is_verified' => false]);
        return redirect()->back()->with('success', 'Service provider verification has been revoked.');
    }
} 