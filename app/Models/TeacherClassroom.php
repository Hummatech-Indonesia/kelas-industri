<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherClassroom extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'classroom_id'];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
