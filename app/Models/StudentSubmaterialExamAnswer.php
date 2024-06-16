<?php

namespace App\Models;

use App\Models\StudentSubmaterialExam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentSubmaterialExamAnswer extends Model
{
    use HasFactory;

    protected $table = "student_submaterial_exam_answers";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'student_submaterial_exam_id', 'student_question_number', 'answer', 'answer_value'
    ];

    /**
     * Get the studentSubMaterialExam that owns the StudentSubmaterialExamAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentSubMaterialExam(): BelongsTo
    {
        return $this->belongsTo(StudentSubmaterialExam::class);
    }

    /**
     * Get all of the essayAnswers for the StudentSubmaterialExamAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function essayAnswers(): HasMany
    {
        return $this->hasMany(StudentSubmaterialExamAnswer::class);
    }
}
