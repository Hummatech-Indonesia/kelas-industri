<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCriteria extends Model
{
    use HasFactory;

    protected $fillable = ['exam_id','score','criteria_id'];
}
