<?php

namespace App\Events;

use App\Model\ProductsUnit;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductsUnitUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $unit;

    /**
     * ProductsUnitUpdated constructor.
     * @param ProductsUnit $unit
     */
    public function __construct(ProductsUnit $unit)
    {
        $this->unit = $unit;
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
