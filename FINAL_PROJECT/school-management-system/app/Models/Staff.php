<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    protected $fillable = [
        'designation',
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'date_of_birth',
        'father_name',
        'mothers_name',
        'aadhar_number',
        'passport_number',
        'voter_id',
        'address_line1',
        'address_line2',
        'city',
        'district',
        'state',
        'pincode',
        'landmark',
         'email',
        'user_id', // if used
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
