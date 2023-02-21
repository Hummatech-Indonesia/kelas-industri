<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenges extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'challenges';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'classroom_id', 'created_by', 'difficulty', 'title', 'description', 'point', 'start_date', 'end_date'];
}
