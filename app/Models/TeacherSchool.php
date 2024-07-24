<?php

namespace App\Models;

use App\Models\TeacherClassroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherSchool extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'school_id'];

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function teacherClassrooms(): HasMany
    {
        return $this->hasMany(TeacherClassroom::class);
    }

    public function teacherClassroom(): HasOne
    {
        return $this->hasOne(TeacherClassroom::class)->latest();
    }
}
