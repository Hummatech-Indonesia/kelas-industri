<?php

namespace App\Models;

use App\Models\User;
use App\Models\SubMaterialExam;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentSubmaterialExamAnswer;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentSubmaterialExam extends Model
{
    use HasFactory;

    protected $table = 'student_submaterial_exams';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'student_id', 'sub_material_exam_id', 'order_of_question_multiple_choice', 'order_of_question_essay', 'answer', 'deadline', 'score', 'true_answer', 'finished_exam'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';

    /**
     * Get the student that owns the StudentSubmaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subMaterialExam that owns the StudentSubmaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subMaterialExam(): BelongsTo
    {
        return $this->belongsTo(SubMaterialExam::class);
    }

    /**
     * Get all of the studentSubMaterialExamAnswers for the StudentSubmaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentSubMaterialExamAnswers(): HasMany
    {
        return $this->hasMany(StudentSubmaterialExamAnswer::class);
    }
}
