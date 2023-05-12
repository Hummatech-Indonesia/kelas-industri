<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assignment extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'assignments';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'assignment_id', 'title', 'description', 'start_date', 'end_date'];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function submaterial(): BelongsTo
    {
        return $this->belongsTo(SubMaterial::class, 'assignment_id');
    }
}
