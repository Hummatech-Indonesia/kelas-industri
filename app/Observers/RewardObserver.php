<?php

namespace App\Observers;

use App\Models\Reward;
use Faker\Provider\Uuid;

class RewardObserver
{
    /**
     * Handle the Reward "creating" event.
     *
     * @param  \App\Models\Reward  $reward
     * @return void
     */
    public function creating(Reward $reward)
    {
        $reward->id = Uuid::uuid();
    }

    /**
     * Handle the Reward "updated" event.
     *
     * @param  \App\Models\Reward  $reward
     * @return void
     */
    public function updated(Reward $reward)
    {
        //
    }

    /**
     * Handle the Reward "deleted" event.
     *
     * @param  \App\Models\Reward  $reward
     * @return void
     */
    public function deleted(Reward $reward)
    {
        //
    }

    /**
     * Handle the Reward "restored" event.
     *
     * @param  \App\Models\Reward  $reward
     * @return void
     */
    public function restored(Reward $reward)
    {
        //
    }

    /**
     * Handle the Reward "force deleted" event.
     *
     * @param  \App\Models\Reward  $reward
     * @return void
     */
    public function forceDeleted(Reward $reward)
    {
        //
    }
}
