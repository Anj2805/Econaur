<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailTestController extends Controller
{
    public function testEmail()
    {
        try {
            // Log mail configuration
            Log::info('Testing mail configuration', [
                'mailer' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'encryption' => config('mail.mailers.smtp.encryption'),
                'username' => config('mail.mailers.smtp.username'),
                'from_address' => config('mail.from.address'),
                'from_name' => config('mail.from.name'),
            ]);

            // Send test email
            Mail::raw('This is a test email from Econaur', function($message) {
                $message->to(config('mail.from.address'))
                        ->subject('Test Email from Econaur');
            });

            return 'Test email sent successfully! Check your inbox and the Laravel logs.';
        } catch (\Exception $e) {
            Log::error('Mail test failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return 'Failed to send test email. Error: ' . $e->getMessage();
        }
    }
} 