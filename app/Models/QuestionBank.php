<?php

namespace App\Models;

use App\Models\SubMaterial;
use App\Models\QuestionBankAnswer;
use App\Models\SubMaterialExamQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionBank extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'question_banks';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'sub_material_id', 'question', 'option1', 'option2', 'option3', 'option4', 'option5', 'type'];

    /**
     * Get the submaterial that owns the QuestionBank
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function submaterial(): BelongsTo
    {
        return $this->belongsTo(SubMaterial::class, 'sub_material_id');
    }

    /**
     * Get all of the subMaterialExamQuestions for the QuestionBank
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subMaterialExamQuestions(): HasMany
    {
        return $this->hasMany(SubMaterialExamQuestion::class);
    }

    /**
     * Get all of the questionBankAnswers for the QuestionBank
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionBankAnswers(): HasMany
    {
        return $this->hasMany(QuestionBankAnswer::class);
    }
}
