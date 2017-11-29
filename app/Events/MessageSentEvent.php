<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentEvent implements ShouldBroadcast {
	use Dispatchable, InteractsWithSockets, SerializesModels;

	/**
	 * User that sent the message
	 *
	 * @var User
	 */
	public $event_discuss;
	public $event_id;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($eventDiscuss, $event_id) {
		$this->event_discuss = $eventDiscuss;
		$this->event_id = $event_id;
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return Channel|array
	 */
	public function broadcastOn() {
		return new PrivateChannel('chat-event-' . $this->event_id);
	}
}
