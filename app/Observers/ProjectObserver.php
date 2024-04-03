<?php

namespace App\Observers;

use App\Models\Project;
use Faker\Provider\Uuid;

class ProjectObserver
{
    /**
     * Handle the Project "creating" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function creating(Project $project)
    {
        $project->id = Uuid::uuid();
    }
}
