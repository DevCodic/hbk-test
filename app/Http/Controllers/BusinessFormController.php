<?php

namespace App\Http\Controllers;

use App\Models\BusinessForm;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BusinessFormController extends Controller
{
    /**
     * Store a new business form submission.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'is_premium'        => 'required|boolean',
            'business_name'     => 'required|string|max:255',
            'registration_date' => 'required|date',
            'renewal_date'      => 'required|date',
            'expiry_date'       => 'required|date',
            'contact_name'      => 'required|string|max:255',
            'contact_email'     => 'required|email|max:255',
            'contact_phone'     => 'required|string|max:20',
        ]);

        try {
            $businessForm = BusinessForm::create($validatedData);

            return response()->json([
                'message' => 'Form submitted successfully!',
                'data' => $businessForm
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}