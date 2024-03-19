<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devision extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'devisions';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name'];
}
