<?php

namespace App\Models;

use App\Models\Assignment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmitAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['assignment_id', 'student_id', 'file'];

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}
