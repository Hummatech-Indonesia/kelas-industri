<?php

namespace App\Observers;

use Faker\Provider\Uuid;
use App\Models\Challenge;

class ChallengeObserver
{
    /**
     * Handle the Challenge "created" event.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return void
     */
    public function creating(Challenge $challenge)
    {
        $challenge->id = Uuid::uuid();
    }

    /**
     * Handle the Challenge "updated" event.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return void
     */
    public function updated(Challenge $challenge)
    {
        //
    }

    /**
     * Handle the Challenge "deleted" event.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return void
     */
    public function deleted(Challenge $challenge)
    {
        //
    }

    /**
     * Handle the Challenge "restored" event.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return void
     */
    public function restored(Challenge $challenge)
    {
        //
    }

    /**
     * Handle the Challenge "force deleted" event.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return void
     */
    public function forceDeleted(Challenge $challenge)
    {
        //
    }
}
