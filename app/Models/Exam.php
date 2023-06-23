<?php

namespace App\Models;

use App\Models\StudentClassroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    public $incrementing = false;

    public $keyType = 'char';

    protected $table = 'exams';

    protected $primaryKey = 'id';

    protected $fillable = ['id','student_classroom_id', 'exam_type', 'complexity', 'code_cleanliness', 'design','presentation','understanding','task_level'];

    public function studentClassroom():BelongsTo
    {
        return $this->belongsTo(StudentClassroom::class, 'student_classroom_id');
    }
}
