<?php

namespace App\Events\QuizCard;

use App\Models\QuizCard;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Stored implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The QuizCard that is being stored that created the server.
     *
     * @var \App\Models\QuizCard
     */
    public $quizcard;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(QuizCard $quizcard)
    {
        $this->quizcard = $quizcard;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        Logger("Broadcasting QuizCardStored Event on channel: quizcard.".$this->quizcard->user_id);
        return new PrivateChannel('quizcard.'.$this->quizcard->user_id);
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->quizcard->id
        ];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'QuizCardStored';
    }
}
