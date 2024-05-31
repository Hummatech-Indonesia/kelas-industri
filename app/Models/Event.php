<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'for_school', 'limit_participant', 'photo', 'thumnail', 'start_date', 'end_date'];

    /**
     * Get all of the participants for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants(): HasMany
    {
        return $this->hasMany(EventPartisipant::class);
    }

    /**
     * Get all of the documentation for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentations(): HasMany
    {
        return $this->hasMany(EventDocumentation::class);
    }
}
