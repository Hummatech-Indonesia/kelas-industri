<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubMaterial extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'sub_materials';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'material_id', 'title', 'description', 'student_file', 'teacher_file'];

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function assignments() : HasMany
    {
        return $this->hasMany(Assignment::class);
    }
}
