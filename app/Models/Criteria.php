<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'type', 'weight', 'status','is_default','devision_id'];

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
}
