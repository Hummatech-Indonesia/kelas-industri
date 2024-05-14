<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'user_id', 'total_pay', 'payment_date', 'semester', 'invoice_id', 'fee_amount', 'expired_date', 'invoice_status', 'paid_amount','reference','via','icon_url'];

    /**
     * Get the user that owns the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dependent(): BelongsTo {
        return $this->belongsTo(Dependent::class);
    }
}
