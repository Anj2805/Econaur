@php
use App\Models\DemoRequest;
@endphp

@component('mail::message')
# New Demo Request

A new demo request has been submitted with the following details:

**Location:** {{ $demoRequest->location }}  
**Phone:** {{ $demoRequest->phone ?? 'Not provided' }}  
**User Type:** {{ DemoRequest::USER_TYPES[$demoRequest->user_type] }}
@if($demoRequest->user_type === 'other')
({{ $demoRequest->other_type }})
@endif

**Demo Mode:** {{ DemoRequest::DEMO_MODES[$demoRequest->demo_mode] }}

**Interests:**
@foreach($demoRequest->interests as $interest)
- {{ DemoRequest::INTERESTS[$interest] }}
@endforeach
@if($demoRequest->other_interest)
- Other: {{ $demoRequest->other_interest }}
@endif

@if($demoRequest->notes)
**Additional Notes:**
{{ $demoRequest->notes }}
@endif

@component('mail::button', ['url' => route('admin.demo-requests.show', $demoRequest)])
View Request Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent 