<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ZoomSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'classroom_id',
        'mentor_id',
        'link',
        'date'
    ];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
}
