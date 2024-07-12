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

    protected $fillable = ['id','sub_material_id','title','slug', 'type','total_multiple_choice', 'total_essay', 'multiple_choice_value', 'essay_value','start_at', 'end_at', 'cheating_detector', 'last_submit', 'time', 'status', 'school_id', 'total_student'];

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

    /**
     * Get all of the studentSubmaterialExam for the SubMaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentSubmaterialExams(): HasMany
    {
        return $this->hasMany(studentSubmaterialExam::class, 'sub_material_exam_id');
    }

    /**
     * Get the school that owns the SubMaterial
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(User::class, 'school_id');
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
