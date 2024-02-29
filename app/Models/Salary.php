<?php

namespace App\Models;

use App\Models\User;
use App\Models\Generation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'salaries';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'payday', 'salary_amount', 'photo', 'generation_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

}
