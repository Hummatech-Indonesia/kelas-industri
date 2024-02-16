<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use Sluggable;

    public $incrementing = false;
    public $keyType = 'char';
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'photo', 'description', 'date', 'status'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
