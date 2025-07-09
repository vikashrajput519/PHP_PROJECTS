<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
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
        'roll_number',
        'user_id', // if used
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    protected static function boot()
{
    parent::boot();

    static::creating(function ($student) {
        $lastId = self::max('id') + 1;
        $student->roll_number = 'STU' . str_pad($lastId, 4, '0', STR_PAD_LEFT); // STU0001
    });
}
}
