<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materials extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'materials';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'generation_id', 'title', 'description'];

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
        return $this->hasMany(SubMaterials::class, 'material_id');
    }
}
