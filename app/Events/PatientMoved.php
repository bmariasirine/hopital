<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PatientMoved implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $patientId;
    public $salleId;

    public function __construct($patientId, $salleId)
    {
        $this->patientId = $patientId;
        $this->salleId = $salleId;
    }

    public function broadcastOn()
    {
        return new Channel('salle.' . $this->salleId);
    }

    public function broadcastWith()
    {
        return [
            'patientId' => $this->patientId,
            'salleId' => $this->salleId,
        ];
    }
}