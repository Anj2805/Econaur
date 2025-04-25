<?php

namespace App\Http\Controllers;

use App\Models\DemoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookDemoRequest;
use App\Mail\DemoRequestConfirmation;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BookDemoController extends Controller
{
    public function show()
    {
        return view('book-demo');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'location' => 'required|string|max:255',
                'user_type' => 'required|string|in:individual,provider,educator,institution,municipal,other',
                'other_type' => 'nullable|required_if:user_type,other|string|max:255',
                'interests' => 'required|array',
                'interests.*' => 'string|in:composting_setup,learning,listing,waste_pickup,educational,other_interest',
                'other_interest' => 'nullable|string|max:255',
                'demo_mode' => 'required|string|in:video,phone,pdf,not_sure',
                'notes' => 'nullable|string|max:1000',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed', [
                    'errors' => $validator->errors()->toArray(),
                    'request_data' => $request->except(['_token'])
                ]);
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $validated = $validator->validated();

            Log::info('Creating demo request', [
                'email' => $validated['email'],
                'user_type' => $validated['user_type'],
                'demo_mode' => $validated['demo_mode']
            ]);

            // Create the demo request
            $demoRequest = DemoRequest::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'location' => $validated['location'],
                'user_type' => $validated['user_type'],
                'other_type' => $validated['other_type'] ?? null,
                'interests' => $validated['interests'],
                'other_interest' => $validated['other_interest'] ?? null,
                'demo_mode' => $validated['demo_mode'],
                'notes' => $validated['notes'] ?? null,
                'status' => 'pending',
            ]);

            Log::info('Demo request created', ['id' => $demoRequest->id]);

            try {
                // Log mail configuration before sending
                Log::info('Mail configuration', [
                    'mailer' => config('mail.default'),
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port'),
                    'encryption' => config('mail.mailers.smtp.encryption'),
                    'username' => config('mail.mailers.smtp.username'),
                    'from_address' => config('mail.from.address'),
                    'from_name' => config('mail.from.name'),
                ]);

                // Send email notification to admin
                Mail::to(config('mail.admin_email', 'admin@econaur.com'))->send(new BookDemoRequest($demoRequest));
                Log::info('Admin notification email sent', ['demo_request_id' => $demoRequest->id]);
            } catch (Exception $e) {
                Log::error('Failed to send admin notification', [
                    'demo_request_id' => $demoRequest->id,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'mail_config' => [
                        'mailer' => config('mail.default'),
                        'host' => config('mail.mailers.smtp.host'),
                        'port' => config('mail.mailers.smtp.port'),
                        'encryption' => config('mail.mailers.smtp.encryption'),
                    ]
                ]);
            }

            try {
                // Send confirmation email to user
                Mail::to($demoRequest->email)->send(new DemoRequestConfirmation($demoRequest));
                Log::info('User confirmation email sent', [
                    'demo_request_id' => $demoRequest->id,
                    'user_email' => $demoRequest->email
                ]);
            } catch (Exception $e) {
                Log::error('Failed to send user confirmation', [
                    'demo_request_id' => $demoRequest->id,
                    'user_email' => $demoRequest->email,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'mail_config' => [
                        'mailer' => config('mail.default'),
                        'host' => config('mail.mailers.smtp.host'),
                        'port' => config('mail.mailers.smtp.port'),
                        'encryption' => config('mail.mailers.smtp.encryption'),
                    ]
                ]);
            }

            return redirect()->route('book-demo')->with('success', 'Thank you for your interest! We will contact you within 1-2 business days to schedule your demo.');
        } catch (Exception $e) {
            Log::error('Demo request failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['_token'])
            ]);

            return redirect()->route('book-demo')->with('error', 'There was an error processing your request. Please try again later.');
        }
    }
} 