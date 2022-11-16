<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Mail\EventCreated;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;

class EventController extends Controller
{
    public function create(EventRequest $request)
    {
        $dateTime = Carbon::parse($request->date . ' ' . $request->time);

        $event = Event::create([
            'title' => $request->title,
            'address' => $request->field_string,
            'date' => $dateTime,
        ]);

        $mailList = User::where('comm_events', true)->get(['id', 'email']);
        foreach ($mailList as $recipient) {
            Mail::to($recipient->email)->send(new EventCreated($event, $recipient));
        }

//        Mail::send('emails.eventCreated', [
//            'event' => $event
//        ], function ($mail) use ($mailList, $event) {
//            $mail->to($mailList);
//            $mail->subject('Willows Security Village Event: '.$event->title);
//        });

        session()->flash(
            'flash_message',
            [
                'heading' => 'Created',
                'message' => 'New Event Created',
                'type' => 'bg-success'
            ]
        );

        return back();
    }
}
