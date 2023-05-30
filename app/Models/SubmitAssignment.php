<?php

namespace App\Models;

use App\Models\Assignment;
use App\Models\SubmitAssignment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmitAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['assignment_id', 'student_id', 'file'];

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}

?>
