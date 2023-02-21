<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'materials';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'generation_id', 'title', 'description'];
}
