<?php

namespace App\Mail;

use App\Models\News;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class UpdateCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $news;
    public $messageType = 'news';
    public $unsubscribe;

    /**
     * UpdateCreated constructor.
     * @param News $news
     * @param string $recipient
     */
    public function __construct(News $news, User $recipient)
    {
        $this->news = $news;
        $this->unsubscribe = env('APP_URL') . '/unsubscribe/' . $this->messageType. '/' . Crypt::encrypt($recipient->email.'_'.$recipient->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.updateCreated')
            ->subject('Newsletter: '.$this->news->subject);
    }
}
