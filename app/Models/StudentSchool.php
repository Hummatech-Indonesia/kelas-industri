<?php

namespace App\Models;

use App\Models\Point;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentSchool extends Model
{
    use HasFactory;

    protected $fillable = ['school_id', 'student_id'];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function classrooms(): HasMany
    {
        return $this->hasMany(StudentClassroom::class);
    }

    public function studentClassroom(): HasOne
    {
        return $this->hasOne(StudentClassroom::class)->latest();
    }

    /**
     * Get the school that owns the StudentSchool
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
    return $this->belongsTo(User::class, 'school_id');
    }

}
