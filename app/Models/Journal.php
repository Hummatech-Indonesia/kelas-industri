<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'description','classroom_id', 'created_by'];

    public function classroom():BelongsTo
    {
        return $this->belongsTo(classroom::class);
    }

}
