<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentClassroom extends Model
{
    use HasFactory;

    protected $fillable = ['student_school_id', 'classroom_id'];

    /**
     * one to one relationship
     *
     * @return BelongsTo
     */
    public function studentSchool(): BelongsTo
    {
        return $this->belongsTo(StudentSchool::class);
    }

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
}
