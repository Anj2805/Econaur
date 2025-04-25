@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-[#0d2f2f]">Demo Request Details</h1>
                    <a href="{{ route('admin.demo-requests.index') }}" class="text-[#0d2f2f] hover:text-[#d2e526]">
                        ← Back to List
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Request Details -->
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-lg font-medium text-[#0d2f2f] mb-4">Request Information</h2>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Location</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $demoRequest->location }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $demoRequest->phone ?? 'Not provided' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">User Type</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ DemoRequest::USER_TYPES[$demoRequest->user_type] }}
                                        @if($demoRequest->user_type === 'other')
                                            ({{ $demoRequest->other_type }})
                                        @endif
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Demo Mode</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ DemoRequest::DEMO_MODES[$demoRequest->demo_mode] }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Interests</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <ul class="list-disc list-inside">
                                            @foreach($demoRequest->interests as $interest)
                                                <li>{{ DemoRequest::INTERESTS[$interest] }}</li>
                                            @endforeach
                                            @if($demoRequest->other_interest)
                                                <li>Other: {{ $demoRequest->other_interest }}</li>
                                            @endif
                                        </ul>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Notes</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $demoRequest->notes ?? 'No notes provided' }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Status Update Form -->
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-lg font-medium text-[#0d2f2f] mb-4">Update Status</h2>
                            <form action="{{ route('admin.demo-requests.update-status', $demoRequest) }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PATCH')
                                
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]">
                                        @foreach(DemoRequest::STATUSES as $value => $label)
                                            <option value="{{ $value }}" {{ $demoRequest->status === $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="scheduled_at" class="block text-sm font-medium text-gray-700">Scheduled Date/Time</label>
                                    <input type="datetime-local" name="scheduled_at" id="scheduled_at" 
                                        value="{{ $demoRequest->scheduled_at ? $demoRequest->scheduled_at->format('Y-m-d\TH:i') : '' }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0d2f2f] focus:ring-[#0d2f2f]">
                                </div>

                                <div>
                                    <button type="submit" class="bg-[#0d2f2f] text-white px-4 py-2 rounded-md hover:bg-[#d2e526] hover:text-black transition-all duration-300">
                                        Update Status
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 