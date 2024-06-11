<?php

namespace App\Models;

use App\Models\SubMaterial;
use App\Models\SubMaterialExamQuestion;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubMaterialExam extends Model
{
    use HasFactory;
    use Sluggable;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'sub_material_exams';
    protected $primaryKey = 'id';

    protected $fillable = ['id','sub_material_id','title','slug', 'total_multiple_choice', 'total_essay', 'multiple_choice_value', 'essay_value','start_at', 'end_at', 'cheating_detector', 'last_submit', 'time', 'status'];

    /**
     * Get the user that owns the SubMaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subMaterial(): BelongsTo
    {
        return $this->belongsTo(SubMaterial::class);
    }

    /**
     * Get all of the subMaterialExamQuestions for the SubMaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subMaterialExamQuestions(): HasMany
    {
        return $this->hasMany(SubMaterialExamQuestion::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
