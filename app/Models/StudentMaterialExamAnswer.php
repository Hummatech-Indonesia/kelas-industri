<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentMaterialExamAnswer extends Model
{
    use HasFactory;

    protected $table ='student_material_exam_answers';
    protected $fillable = ['student_exam_id','student_question_number','answer','answer_value'];

    /**
     * Get the studentMaterialExam that owns the StudentMaterialExamAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentMaterialExam(): BelongsTo
    {
        return $this->belongsTo(StudentMaterialExam::class, 'student_exam_id');
    }


}
