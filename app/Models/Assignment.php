<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'assignments';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'sub_material_id', 'title', 'description', 'start_date', 'end_date'];
}
