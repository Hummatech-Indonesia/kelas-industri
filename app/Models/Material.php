<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Material extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'materials';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'generation_id', 'title', 'description', 'devision_id'];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function subMaterials(): HasMany
    {
        return $this->hasMany(SubMaterial::class, 'material_id');
    }

    /**
     * Get all of the exams for the Material
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exam(): HasOne
    {
        return $this->hasOne(MaterialExam::class);
    }

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function devision(): BelongsTo
    {
        return $this->belongsTo(Devision::class, 'devision_id');
    }
}
