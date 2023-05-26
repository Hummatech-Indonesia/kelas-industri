<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\SubmitChallenge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Challenge extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'challenges';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'classroom_id', 'created_by', 'difficulty', 'title', 'description', 'point', 'start_date', 'end_date'];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function StudentSubmitChallenge(): HasOne
    {
        return $this->hasOne(SubmitChallenge::class)->where('student_school_id', auth()->user()->studentSchool->id);
    }

    /**
     * Get the user associated with the Challenge
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function StudentChallenge(): HasMany
    {
        return $this->hasMany(SubmitChallenge::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
