@php
use App\Models\DemoRequest;
@endphp

@component('mail::message')
# Thank You for Booking a Demo with Econaur 🌱

Hi {{ $demoRequest->first_name }},

Thank you for your interest in Econaur – your digital companion for smart composting and waste management.

We've received your request and are thrilled to help you on your journey towards a cleaner, greener future. One of our experts will reach out to you within 1–2 business days to schedule your personalized product walkthrough.

Here's a quick summary of the information you provided:

**👤 Name:** {{ $demoRequest->first_name }} {{ $demoRequest->last_name }}  
**📧 Email:** {{ $demoRequest->email }}  
**📱 Phone Number:** {{ $demoRequest->phone ?? 'Not provided' }}  
**📍 Location:** {{ $demoRequest->location }}  
**🧑 You are a:** {{ DemoRequest::USER_TYPES[$demoRequest->user_type] }}
@if($demoRequest->user_type === 'other')
({{ $demoRequest->other_type }})
@endif

**🔍 Interested in:**
@foreach($demoRequest->interests as $interest)
- {{ DemoRequest::INTERESTS[$interest] }}
@endforeach
@if($demoRequest->other_interest)
- Other: {{ $demoRequest->other_interest }}
@endif

**📞 Preferred Demo Mode:** {{ DemoRequest::DEMO_MODES[$demoRequest->demo_mode] }}

@if($demoRequest->notes)
**📝 Additional Notes:**
{{ $demoRequest->notes }}
@endif

We look forward to connecting with you soon!

Best regards,<br>
The Econaur Team
@endcomponent 