<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Material;
use App\Models\Challenge;
use App\Models\Classroom;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\SubMaterial;
use App\Observers\UserObserver;
use App\Observers\MaterialObserver;
use App\Observers\ChallengeObserver;
use App\Observers\ClassroomObserver;
use App\Observers\AssignmentObserver;
use App\Observers\AttendanceObserver;
use App\Observers\SubmaterialObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Material::observe(MaterialObserver::class);
        SubMaterial::observe(SubmaterialObserver::class);
        Assignment::observe(AssignmentObserver::class);
        Classroom::observe(ClassroomObserver::class);
        Challenge::observe(ChallengeObserver::class);
        Attendance::observe(AttendanceObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
