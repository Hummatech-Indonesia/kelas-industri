<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'photo',
        'bank',
        'account_number',
        'headmaster',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * one to many relaltionship
     *
     * @return HasMany
     */
    public function studentClassrooms(): HasMany
    {
        return $this->hasMany(StudentClassroom::class, 'student_id');
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function mentorClassrooms(): HasMany
    {
        return $this->hasMany(MentorClassroom::class, 'mentor_id');
    }

    /**
     * one to one relationship
     *
     * @return HasOne
     */
    public function teacherSchool(): HasOne
    {
        return $this->hasOne(TeacherSchool::class, 'teacher_id');
    }

    public function teachers(): HasMany
    {
        return $this->hasMany(TeacherSchool::class, 'school_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(StudentSchool::class, 'student_id');
    }

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class, 'school_id');
    }
}
