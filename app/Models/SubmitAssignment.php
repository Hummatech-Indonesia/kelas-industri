<?php

namespace App\Models;

use App\Models\Assignment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubmitAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['assignment_id', 'student_id', 'file', 'link', 'point'];

    protected $casts = [
        'id' => 'string',
    ];

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the images for the SubmitAssignment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(SubmitAssignmentImage::class, 'submit_assignment_id');
    }
}
