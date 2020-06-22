<?php

namespace App\Events;

use App\Patient;
use App\RapportLaboratoire;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RapportUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
	/**
	 * @var RapportLaboratoire
	 */
	public $rapport;
	/**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(RapportLaboratoire $rapport)
    {
        //
	    $this->rapport = $rapport;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
