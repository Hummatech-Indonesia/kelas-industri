<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'attendances';
    protected $primaryKey = 'id';

    protected $fillable = ['id','title', 'created_by'];

    protected $guarded = [];

    public function mentor():BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
