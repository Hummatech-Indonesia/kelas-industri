<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'name', 'start', 'description', 'photo', 'status', 'deadline', 'progress', 'message'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
