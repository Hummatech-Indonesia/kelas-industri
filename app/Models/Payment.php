<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'user_id', 'total_pay', 'payment_date'];
}
