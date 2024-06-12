<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmaterialExam extends Model
{
    use HasFactory;

    protected $table = 'student_submaterial_exams';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'student_id', 'sub_material_exam_id', 'order_of_question_multiple_choice', 'order_of_question_essay', 'answer', 'deadline', 'score', 'true_answer', 'finished_exam'];
    protected $guarded = [];
    public $incrementing = false;
    public $keyType = 'char';
}
