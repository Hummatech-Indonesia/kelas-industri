<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assignment extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'assignments';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'sub_material_id', 'title', 'description', 'start_date', 'end_date'];

    protected $casts = [
        'id' => 'string',
    ];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function submaterial(): BelongsTo
    {
        return $this->belongsTo(SubMaterial::class, 'sub_material_id');
    }

    public function StudentSubmitAssignment(): HasMany
    {
        return $this->hasMany(SubmitAssignment::class ,'assignment_id');
    }

}
