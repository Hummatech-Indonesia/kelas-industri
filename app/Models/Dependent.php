<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dependent extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'dependents';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'semester', 'classroom_id', 'nominal', 'deadline'];

    /**
     * Get the user that owns the Dependent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

}
