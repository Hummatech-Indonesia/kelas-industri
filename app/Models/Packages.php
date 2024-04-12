<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'packages';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name', 'price', 'description', 'image', 'status'];
}
