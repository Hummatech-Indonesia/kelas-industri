<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Classroom extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'classrooms';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'generation_id', 'school_id', 'name'];

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(StudentClassroom::class);
    }

    /**
     * one to one relationship
     *
     * @return HasOne
     */
    public function teacherClassroom(): HasOne
    {
        return $this->hasOne(TeacherClassroom::class);
    }

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * many to one relationship
     *
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(User::class, 'school_id');
    }
}
