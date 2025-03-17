<?php

use App\Models\BusinessForm;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it submits a valid business form', function () {
    $formData = [
        'is_premium'        => true,
        'business_name'     => 'Tech Innovators Inc.',
        'registration_date' => '2025-03-18',
        'renewal_date'      => '2026-03-18',
        'expiry_date'       => '2027-03-18',
        'contact_name'      => 'John Doe',
        'contact_email'     => 'johndoe@example.com',
        'contact_phone'     => '+123456789',
    ];

    $response = $this->postJson('/api/submit-form', $formData);

    $response->assertStatus(201)
             ->assertJson([
                 'message' => 'Form submitted successfully!',
                 'data' => $formData
             ]);

    $this->assertDatabaseHas('business_forms', [
        'business_name' => 'Tech Innovators Inc.',
        'contact_email' => 'johndoe@example.com',
    ]);
});

test('it fails when required fields are missing', function () {
    $response = $this->postJson('/api/submit-form', []);

    $response->assertStatus(422)  // Laravel validation returns 422 for missing fields
             ->assertJsonValidationErrors([
                 'is_premium', 
                 'business_name'
             ]);
});