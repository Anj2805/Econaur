<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;
use App\Models\ServiceLocation;
use App\Models\ServiceProvider;
use App\Models\User;

class ServiceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Categories
        $categories = [
            ['name' => 'Solar Installation', 'slug' => 'solar-installation', 'description' => 'Solar panel installation services'],
            ['name' => 'Energy Audit', 'slug' => 'energy-audit', 'description' => 'Professional energy consumption analysis'],
            ['name' => 'Green Building', 'slug' => 'green-building', 'description' => 'Sustainable building solutions'],
            ['name' => 'Waste Management', 'slug' => 'waste-management', 'description' => 'Eco-friendly waste disposal services'],
        ];

        foreach ($categories as $category) {
            ServiceCategory::create($category);
        }

        // Create Locations
        $locations = [
            [
                'name' => 'New York City',
                'address' => '123 Broadway',
                'city' => 'New York',
                'state' => 'NY',
                'country' => 'USA',
                'postal_code' => '10007'
            ],
            [
                'name' => 'Los Angeles',
                'address' => '456 Hollywood Blvd',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'country' => 'USA',
                'postal_code' => '90028'
            ],
            [
                'name' => 'Chicago',
                'address' => '789 Michigan Ave',
                'city' => 'Chicago',
                'state' => 'IL',
                'country' => 'USA',
                'postal_code' => '60601'
            ],
            [
                'name' => 'Houston',
                'address' => '321 Main St',
                'city' => 'Houston',
                'state' => 'TX',
                'country' => 'USA',
                'postal_code' => '77002'
            ],
        ];

        foreach ($locations as $location) {
            ServiceLocation::create($location);
        }

        // Create a test user for service provider
        $user = User::firstOrCreate(
            ['email' => 'provider@example.com'],
            [
                'name' => 'Test Provider',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create Service Providers
        $providers = [
            [
                'user_id' => $user->id,
                'business_name' => 'EcoSolutions Inc',
                'description' => 'Leading provider of sustainable solutions',
                'phone' => '123-456-7890',
                'email' => 'contact@ecosolutions.com',
                'is_verified' => true,
                'is_active' => true,
            ],
            [
                'user_id' => $user->id,
                'business_name' => 'Green Energy Partners',
                'description' => 'Specialized in renewable energy solutions',
                'phone' => '098-765-4321',
                'email' => 'info@greenenergypartners.com',
                'is_verified' => true,
                'is_active' => true,
            ],
        ];

        foreach ($providers as $provider) {
            ServiceProvider::create($provider);
        }
    }
}
