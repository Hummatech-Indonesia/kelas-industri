<?php

namespace App\Models;

use App\Models\Point;
use App\Models\Salary;
use App\Models\SchoolPackage;
use Laravel\Sanctum\HasApiTokens;
use App\Models\StudentSubmaterialExam;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'gender',
        'date_birth',
        'national_student_id',
        'status',
        'motivation',
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
     * @return HasOne
     */
    public function studentSchool(): HasOne
    {
        return $this->hasOne(StudentSchool::class, 'student_id')->latest();
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function studentSchools(): HasMany
    {
        return $this->hasMany(StudentSchool::class, 'school_id');
    }

    /**
     * Get the regristationExam associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function regristationExam(): HasOne
    {
        return $this->hasOne(SubMaterialExam::class, 'school_id');
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function userSalarys(): HasMany
    {
        return $this->hasMany(Salary::class, 'user_id');
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

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function teachers(): HasMany
    {
        return $this->hasMany(TeacherSchool::class, 'school_id');
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(StudentSchool::class, 'student_id');
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function schoolStudents(): HasMany
    {
        return $this->hasMany(StudentSchool::class, 'school_id');
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class, 'school_id');
    }

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function submitAssignments(): HasMany
    {
        return $this->hasMany(SubmitAssignment::class, 'student_id');
    }

    public function point(): HasOne
    {
        return $this->hasOne(Point::class, 'student_id');
    }

    /**
     * journals
     *
     * @return HasMany
     */
    public function journals(): HasMany
    {
        return $this->hasMany(Journal::class, 'created_by');
    }

    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    /**
     * one to one relationship
     *
     * @return HasOne
     */
    public function project(): HasOne
    {
        return $this->hasOne(Project::class, 'user_id');
    }

    /**
     * Get all of the schoolPackages for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schoolPackages(): HasMany
    {
        return $this->hasMany(SchoolPackage::class, 'school_id');
    }

    public function submitAssignment(): HasOne
    {
        return $this->hasOne(SubmitAssignment::class, 'student_id');
    }

    public function EventParticipants(): HasMany {
        return $this->hasMany(EventPartisipant::class);
    }

    /**
     * Get all of the studentSubmaterialExam for the SubMaterialExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentSubmaterialExams(): HasMany
    {
        return $this->hasMany(StudentSubmaterialExam::class);
    }
}
