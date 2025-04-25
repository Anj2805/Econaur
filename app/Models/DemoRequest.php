<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'location',
        'user_type',
        'other_type',
        'interests',
        'other_interest',
        'demo_mode',
        'notes',
        'status',
        'scheduled_at',
    ];

    protected $casts = [
        'interests' => 'array',
        'scheduled_at' => 'datetime',
    ];

    public const STATUSES = [
        'pending' => 'Pending',
        'contacted' => 'Contacted',
        'scheduled' => 'Scheduled',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
    ];

    public const USER_TYPES = [
        'individual' => 'Individual (interested in composting)',
        'provider' => 'Composting Service Provider',
        'educator' => 'Educator/Trainer',
        'institution' => 'Institution/Organization',
        'municipal' => 'Municipal Body',
        'other' => 'Other',
    ];

    public const DEMO_MODES = [
        'video' => 'Video call (Google Meet/Zoom)',
        'phone' => 'Phone call',
        'pdf' => 'Just send me a walkthrough/demo PDF',
        'not_sure' => 'Not sure yet',
    ];

    public const INTERESTS = [
        'composting_setup' => 'Composting setup at home',
        'learning' => 'Learning about composting',
        'listing' => 'Listing my service',
        'waste_pickup' => 'Waste pickup/management service',
        'educational' => 'Educational content or awareness',
        'other_interest' => 'Other',
    ];
} 