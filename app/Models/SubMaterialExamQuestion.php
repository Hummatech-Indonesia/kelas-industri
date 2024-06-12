<?php

namespace App\Models;

use App\Models\QuestionBank;
use App\Models\SubMaterialExam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubMaterialExamQuestion extends Model
{
    use HasFactory;

    protected $tables = 'sub_material_exam_questions';
    protected $fillable = ['id', 'sub_material_exam_id', 'question_bank_id', 'question_number'];

    /**
     * Get the subMaterialExam that owns the SubMaterialExamQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subMaterialExam(): BelongsTo
    {
        return $this->belongsTo(SubMaterialExam::class);
    }

    /**
     * Get the questionBank that owns the SubMaterialExamQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionBank(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class);
    }
}
