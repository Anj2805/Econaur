<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'latitude',
        'longitude',
        'is_primary',
        'is_active'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceProvider()
    {
        return $this->hasOneThrough(
            ServiceProvider::class,
            Service::class,
            'id',
            'id',
            'service_id',
            'service_provider_id'
        );
    }
}
