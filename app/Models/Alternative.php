<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternative extends Model
{
    use HasFactory;

    protected $table = 'alternatives';
    protected $primaryKey = 'id';
    protected $fillable = ['student_school_id', 'status','batch_id'];

    /**
     * Scope a query to only include active users.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }

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
     * Get the studentSchool that owns the Alternative
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentSchool(): BelongsTo
    {
        return $this->belongsTo(StudentSchool::class,'student_school_id');
    }

    /**
     * Get the batch that owns the Alternative
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }
}
