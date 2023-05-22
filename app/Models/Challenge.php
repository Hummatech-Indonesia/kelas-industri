<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
