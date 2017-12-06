<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\TripSubPassenger;
use App\Events\TripCanceled;
use App\Events\TripAddPassenger;
use App\Listeners\TripSubPassengerListener;
use App\Listeners\TripAddPassengerListener;
use App\Listeners\TripCanceledListener;

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
        ],
        TripCanceled::class => [
            TripCanceledListener::class
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
