<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_provider_id',
        'category_id',
        'location_id',
        'title',
        'description',
        'price',
        'price_unit',
        'is_available',
        'is_active',
        'image'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // If the image path already starts with 'storage/', return it as is
        if (strpos($this->image, 'storage/') === 0) {
            return asset($this->image);
        }

        // Otherwise, prepend 'storage/' to the path
        return asset('storage/' . $this->image);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(ServiceLocation::class, 'location_id');
    }

    public function reviews()
    {
        return $this->hasMany(ServiceReview::class);
    }
}
