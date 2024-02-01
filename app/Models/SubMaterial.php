<?php

namespace App\Models;

use App\Models\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubMaterial extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'sub_materials';
    protected $primaryKey = 'id';

    protected $fillable = ['id','material_id','order','title', 'description', 'student_file', 'teacher_file'];

    /**
     * one to many relationship
     *
     * @return HasMany
     */
    public function assignments() : HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function material() : BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
