<?php

namespace App\Models;

use App\Models\User;
use App\Models\Packages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolPackage extends Model
{
    use HasFactory;
    protected $table = 'school_packages';
    protected $primaryKey = 'id';
    protected $fillable = ['school_id','package_name','price','status'];

    /**
     * Get the school that owns the SchoolPackage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
