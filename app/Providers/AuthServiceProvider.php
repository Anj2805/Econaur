<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\ServiceLocation;
use App\Models\ServiceProvider as ServiceProviderModel;
use App\Models\ServiceReview;
use App\Policies\ServiceLocationPolicy;
use App\Policies\ServicePolicy;
use App\Policies\ServiceProviderPolicy;
use App\Policies\ServiceReviewPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ServiceProviderModel::class => ServiceProviderPolicy::class,
        Service::class => ServicePolicy::class,
        ServiceLocation::class => ServiceLocationPolicy::class,
        ServiceReview::class => ServiceReviewPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define any additional gates here if needed
    }
} 