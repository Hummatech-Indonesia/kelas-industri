<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialExamQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'material_exam_id', 'question_bank_id', 'question_number'];


    public function questionBank(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class);
    }

    /**
     * Get the materialExam that owns the MaterialExamQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materialExam(): BelongsTo
    {
        return $this->belongsTo(MaterialExam::class);
    }
}
