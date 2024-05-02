<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'project_id', 'message'];

    public function project() : BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
