<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Batch extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'batches';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id','status','name','classroom_id','exam_type','semester'];

    /**
     * One-to-Many relationship with Alternative Criteria Model
     *
     * @return HasMany
     */
    public function alternative_criterias(): HasMany
    {
        return $this->hasMany(AlternativeCriteria::class);
    }

    /**
     * One-to-Many relationship with Alternative Model
     *
     * @return HasManyThrough
     */
    public function through_alternatives(): HasManyThrough
    {
        return $this->hasManyThrough(
            Alternative::class,
            AlternativeCriteria::class,
            'batch_id',
            'id',
            'id',
            'alternative_id'
        );
    }

    /**
     * One-to-Many relationship with Criteria Model
     *
     * @return HasManyThrough
     */
    public function through_criterias(): HasManyThrough
    {
        return $this->hasManyThrough(
            Criteria::class,
            AlternativeCriteria::class,
            'batch_id',
            'id',
            'id',
            'criteria_id'
        );
    }

    /**
     * One-to-Many relationship with Batch Result Model
     *
     * @return HasMany
     */
    public function batch_results(): HasMany
    {
        return $this->hasMany(BatchResult::class);
    }

    /**
     * Get the classroom that owns the Batch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
}
