<?php

namespace App\Mail;

use App\Models\DemoRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookDemoRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $demoRequest;

    public function __construct(DemoRequest $demoRequest)
    {
        $this->demoRequest = $demoRequest;
    }

    public function build()
    {
        return $this->subject('New Demo Request - ' . $this->demoRequest->location)
                    ->markdown('emails.demo-request');
    }
} 