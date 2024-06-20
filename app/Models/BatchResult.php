<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BatchResult extends Model
{
    use HasFactory;

    protected $table = 'batch_results';
    protected $primaryKey = 'id';
    protected $fillable = ['batch_id', 'alternative_id', 'rank', 'final_score'];

    /**
     * One-to-Many relationship with Alternative Model
     *
     * @return BelongsTo
     */
    public function alternative(): BelongsTo
    {
        return $this->belongsTo(Alternative::class);
    }
}
