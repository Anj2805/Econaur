<?php

namespace App\Policies;

use App\Models\ServiceReview;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true; // Anyone can view the list of service reviews
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, ServiceReview $serviceReview): bool
    {
        return true; // Anyone can view a service review's details
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Any authenticated user can create a service review
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ServiceReview $serviceReview): bool
    {
        return $user->id === $serviceReview->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ServiceReview $serviceReview): bool
    {
        return $user->id === $serviceReview->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ServiceReview $serviceReview): bool
    {
        return $user->id === $serviceReview->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ServiceReview $serviceReview): bool
    {
        return $user->id === $serviceReview->user_id;
    }
} 