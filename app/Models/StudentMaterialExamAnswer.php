<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentMaterialExamAnswer extends Model
{
    use HasFactory;


    /**
     * Get the studentMaterialExam that owns the StudentMaterialExamAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentMaterialExam(): BelongsTo
    {
        return $this->belongsTo(StudentMaterialExam::class, 'foreign_key', 'other_key');
    }

    
}
