<?php

namespace App\Models;

use App\Models\StudentClassroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JournalAttendance extends Model
{
    use HasFactory;

    protected $fillable = ['journal_id', 'student_classroom_id', 'attendance'];

    public function studentClassroom(): BelongsTo {
        return $this->belongsTo(StudentClassroom::class);
    }

    /**
     * Get the journal that owns the JournalAttendance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function journal(): BelongsTo
    {
        return $this->belongsTo(Journal::class);
    }
}
