<?php

namespace App\Models;

use App\Models\SubMaterial;
use Illuminate\Database\Eloquent\Model;
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
        return $this->belongsTo(SubMaterial::class);
    }
}
