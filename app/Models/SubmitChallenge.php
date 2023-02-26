<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitChallenge extends Model
{
    use HasFactory;

    protected $fillable = ['challenge_id', 'student_id', 'is_valid'];
}
