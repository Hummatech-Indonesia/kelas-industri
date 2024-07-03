<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentMaterialExam extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    public $keyType = 'char';
    public $incrementing = false;

    protected $fillable = [
        'material_exam_id',
        'student_id',
        'order_of_question_multiple_choice',
        'order_of_question_essay',
        'deadline',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subMaterialExam that owns the StudentSubmaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materialExam(): BelongsTo
    {
        return $this->belongsTo(MaterialExam::class);
    }

    /**
     * Get all of the studentSubMaterialExamAnswers for the StudentSubmaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentMaterialExamAnswers(): HasMany
    {
        return $this->hasMany(StudentMaterialExamAnswer::class, 'student_exam_id');
    }
}
