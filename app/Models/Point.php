<?php

namespace App\Models;

use App\Models\StudentSchool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Point extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'point','school_year_id'];

    public function student() :BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

}
