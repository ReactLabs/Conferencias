<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $events;
    private $linkEvent;

    public function __construct($events, String $linkEvent)
    {
        $this->events = $events;
        $this->linkEvent = $linkEvent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.event.deadline', [
            'events' => $this->events,
            'linkEvent' => $this->linkEvent,
        ]);
    }
}
