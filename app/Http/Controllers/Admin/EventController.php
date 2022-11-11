<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create(EventRequest $request)
    {
        $dateTime = Carbon::parse($request->date.' '.$request->time);

        Event::create([
            'title' => $request->title,
            'address' => $request->field_string,
            'date' => $dateTime,
        ]);

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
