<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentation extends Model
{
    use HasFactory;

    protected $table = 'presentations';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'date', 'status', 'presentation_status', 'project_id'];

    /**
     * Get the project that owns the Presentation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}

