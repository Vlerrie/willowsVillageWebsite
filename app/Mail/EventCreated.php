<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mime\Address;

class EventCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $messageType = 'event';
    public $unsubscribe;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event, User $user)
    {
        $this->event = $event;
        $this->unsubscribe = env('APP_URL') . '/unsubscribe/' . $this->messageType. '/' . Crypt::encrypt($user->email.'_'.$user->id);
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.eventCreated')
            ->subject('New Event: '.$this->event->title);
    }
}
