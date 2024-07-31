<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandartOperationProcedure extends Model
{
    use HasFactory;
    protected $fillable = ['sop', 'for_user'];
}
