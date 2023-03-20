<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'classroom_id',
        'mentor_id',
        'link',
        'date'
    ];
}
