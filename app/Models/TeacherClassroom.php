<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherClassroom extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_school_id', 'classroom_id'];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function teacherSchool(): BelongsTo
    {
        return $this->belongsTo(TeacherSchool::class, 'teacher_school_id');
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
