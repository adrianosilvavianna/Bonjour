<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\TripSubPassenger;
use App\Events\TripAddPassenger;
use App\Listeners\TripSubPassengerListener;
use App\Listeners\TripAddPassengerListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        TripSubPassenger::class => [
            TripSubPassengerListener::class
        ],
        TripAddPassenger::class => [
            TripAddPassengerListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
