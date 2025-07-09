<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    protected $fillable = ['name', 'description'];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_program');
    }
}
