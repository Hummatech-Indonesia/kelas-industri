<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function StudentSubmitAssignment(): HasOne
    {
        return $this->hasOne(SubmitAssignment::class);
    }
}
