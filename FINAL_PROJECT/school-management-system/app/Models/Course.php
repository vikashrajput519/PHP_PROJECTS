<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = ['title', 'description', 'code'];

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class, 'course_program');
    }
}
