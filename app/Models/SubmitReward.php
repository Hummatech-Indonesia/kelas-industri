<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reward;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmitReward extends Model
{
    use HasFactory;

    protected $fillable = ['reward_id', 'user_id', 'address', 'phone_number','status'];

    /**
     * Get the user that owns the SubmitReward
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the reward that owns the SubmitReward
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }
}
