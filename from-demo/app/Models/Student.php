<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // If table name Students and model name is Student then it will
    // auto connect else we are use,  protected $table = "Student"

    function dummy() {
        return "This is dummy function";
    }
}
