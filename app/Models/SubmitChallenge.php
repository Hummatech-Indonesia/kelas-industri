<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmitChallenge extends Model
{
    use HasFactory;

    protected $fillable = ['challenge_id', 'student_school_id', 'is_valid', 'file'];

    public function studentSchool(): BelongsTo
    {
        return $this->belongsTo(StudentSchool::class, 'student_school_id');
    }

    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class, 'challenge_id');
    }
}
