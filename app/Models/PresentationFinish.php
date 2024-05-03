<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PresentationFinish extends Model
{
    use HasFactory;

    protected $fillable = ['presentation_id'];

    /**
     * Get the user associated with the PresentationFinish
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function presentation(): BelongsTo
    {
        return $this->belongsTo(Presentation::class);
    }
}
