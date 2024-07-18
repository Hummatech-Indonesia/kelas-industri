<?php

namespace App\Models;

use App\Models\QuestionBank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionBankAnswer extends Model
{
    use HasFactory;
    protected $table = 'question_bank_answers';
    protected $fillable = ['question_bank_id', 'answer'];
    protected $guarded = [];

    /**
     * Get the questionBank that owns the QuestionBankAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function questionBank(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class);
    }

    
}
