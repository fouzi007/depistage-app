<?php

namespace App\Listeners;

use App\Events\RapportUpdated;
use App\Notifications\RapportCreatedNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRapportUpdatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RapportUpdated $event)
    {
	    $users = User::whereHas('roles', function ($query) {
		    $query->where('name','medecin');
	    })->get();

	    foreach($users as $u) {
	    	$u->notify(new RapportCreatedNotification($event->rapport));
	    }
    }
}
