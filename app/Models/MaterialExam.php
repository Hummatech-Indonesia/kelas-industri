<?php

namespace App\Models;

use App\Models\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialExam extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'material_exams';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'material_id',
        'total_multiple_choice',
        'total_essay',
        'multiple_choice_value',
        'essay_value',
        'time',
        'cheating_detector',
        'last_submit',
        'status',
    ];

    /**
     * Get the material that owns the MaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    /**
     * Get all of the materialExamQuestions for the MaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialExamQuestions(): HasMany
    {
        return $this->hasMany(MaterialExamQuestion::class);
    }


    /**
     * Get all of the studentMaterialExam for the MaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
public function studentMaterialExams(): HasMany
    {
        return $this->hasMany(StudentMaterialExam::class);
    }
}
