<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmitAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['assignment_id', 'student_id', 'file'];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
