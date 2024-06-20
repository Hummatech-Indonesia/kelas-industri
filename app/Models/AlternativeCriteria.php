<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlternativeCriteria extends Model
{
    use HasFactory;

    protected $table = 'alternative_criterias';
    protected $primaryKey = 'id';
    protected $fillable = ['criteria_id', 'batch_id', 'alternative_id', 'score'];


    /**
     * One-to-Many relationship with Alternative Model
     *
     * @return BelongsTo
     */
    public function alternative(): BelongsTo
    {
        return $this->belongsTo(Alternative::class,'alternative_id');
    }

    /**
     * One-to-Many relationship with Criteria Model
     *
     * @return BelongsTo
     */
    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class);
    }
}
