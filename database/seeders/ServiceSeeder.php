<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;
use App\Models\ServiceLocation;
use App\Models\ServiceProvider;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        // Create users for service providers
        $ecoSolarUser = User::firstOrCreate(
            ['email' => 'contact@ecosolar.com'],
            [
                'name' => 'EcoSolar Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $windPowerUser = User::firstOrCreate(
            ['email' => 'contact@windpower.com'],
            [
                'name' => 'WindPower Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create categories
        $solarCategory = ServiceCategory::firstOrCreate(
            ['slug' => 'solar-installation'],
            [
                'name' => 'Solar Installation',
                'description' => 'Professional solar panel installation services',
                'is_active' => true
            ]
        );

        $windCategory = ServiceCategory::firstOrCreate(
            ['slug' => 'wind-energy'],
            [
                'name' => 'Wind Energy',
                'description' => 'Wind turbine installation and maintenance',
                'is_active' => true
            ]
        );

        // Create locations
        $mumbaiLocation = ServiceLocation::firstOrCreate(
            ['name' => 'Mumbai'],
            [
                'address' => '123 Solar Street',
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'country' => 'India',
                'is_active' => true
            ]
        );

        $delhiLocation = ServiceLocation::firstOrCreate(
            ['name' => 'Delhi'],
            [
                'address' => '456 Green Avenue',
                'city' => 'Delhi',
                'state' => 'Delhi',
                'country' => 'India',
                'is_active' => true
            ]
        );

        // Create service providers
        $ecoSolar = ServiceProvider::firstOrCreate(
            ['email' => 'contact@ecosolar.com'],
            [
                'user_id' => $ecoSolarUser->id,
                'business_name' => 'EcoSolar Solutions',
                'description' => 'Leading solar installation company',
                'phone' => '9876543210',
                'is_verified' => true,
                'is_active' => true
            ]
        );

        $windPower = ServiceProvider::firstOrCreate(
            ['email' => 'contact@windpower.com'],
            [
                'user_id' => $windPowerUser->id,
                'business_name' => 'WindPower India',
                'description' => 'Specialized in wind energy solutions',
                'phone' => '9876543211',
                'is_verified' => true,
                'is_active' => true
            ]
        );

        // Create services
        Service::firstOrCreate(
            ['title' => 'Residential Solar Panel Installation'],
            [
                'service_provider_id' => $ecoSolar->id,
                'category_id' => $solarCategory->id,
                'location_id' => $mumbaiLocation->id,
                'description' => 'Complete solar panel installation for residential properties',
                'price' => 50000,
                'price_unit' => 'INR',
                'is_available' => true,
                'is_active' => true
            ]
        );

        Service::firstOrCreate(
            ['title' => 'Commercial Solar Panel Installation'],
            [
                'service_provider_id' => $ecoSolar->id,
                'category_id' => $solarCategory->id,
                'location_id' => $delhiLocation->id,
                'description' => 'Large-scale solar panel installation for commercial properties',
                'price' => 200000,
                'price_unit' => 'INR',
                'is_available' => true,
                'is_active' => true
            ]
        );

        Service::firstOrCreate(
            ['title' => 'Small Wind Turbine Installation'],
            [
                'service_provider_id' => $windPower->id,
                'category_id' => $windCategory->id,
                'location_id' => $mumbaiLocation->id,
                'description' => 'Installation of small wind turbines for residential use',
                'price' => 75000,
                'price_unit' => 'INR',
                'is_available' => true,
                'is_active' => true
            ]
        );
    }
} 