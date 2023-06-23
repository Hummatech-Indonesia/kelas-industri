<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
     * Get the user that owns the StudentClassroom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam(): HasOne
    {
        return $this->HasOne(Exam::class,'student_classroom_id');
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
