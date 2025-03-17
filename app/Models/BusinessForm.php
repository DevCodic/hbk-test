<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessForm extends Model
{
    protected $fillable = [
        'is_premium',
        'business_name',
        'registration_date',
        'renewal_date',
        'expiry_date',
        'contact_name',
        'contact_email',
        'contact_phone',
        'business_summary',
    ];
}
