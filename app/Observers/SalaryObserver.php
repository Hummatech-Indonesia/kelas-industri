<?php

namespace App\Observers;

use App\Models\Salary;
use Faker\Provider\Uuid;

class SalaryObserver
{
    /**
     * Handle the Salary "creating" event.
     *
     * @param  \App\Models\Salary  $salary
     * @return void
     */
    public function creating(Salary $salary)
    {
        $salary->id = Uuid::uuid();
    }

    /**
     * Handle the Salary "updated" event.
     *
     * @param  \App\Models\Salary  $salary
     * @return void
     */
    public function updated(Salary $salary)
    {
        //
    }

    /**
     * Handle the Salary "deleted" event.
     *
     * @param  \App\Models\Salary  $salary
     * @return void
     */
    public function deleted(Salary $salary)
    {
        //
    }

    /**
     * Handle the Salary "restored" event.
     *
     * @param  \App\Models\Salary  $salary
     * @return void
     */
    public function restored(Salary $salary)
    {
        //
    }

    /**
     * Handle the Salary "force deleted" event.
     *
     * @param  \App\Models\Salary  $salary
     * @return void
     */
    public function forceDeleted(Salary $salary)
    {
        //
    }
}
