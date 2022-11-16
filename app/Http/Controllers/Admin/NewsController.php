<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Mail\EventCreated;
use App\Mail\UpdateCreated;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
{
    public function create(NewsRequest $request)
    {
        $publish = null;
        if (isset($request->publish)) {
            $publish = Carbon::now('Africa/Johannesburg');
        }
        $news = News::create([
            'subject' => $request->title,
            'body' => $request->body,
            'published' => $publish
        ]);

        $mailList = User::where('comm_newsletter', true)->get(['id', 'email']);
        foreach ($mailList as $recipient) {
            Mail::to($recipient->email)->send(new UpdateCreated($news, $recipient));
        }

        session()->flash(
            'flash_message',
            [
                'heading' => 'Created',
                'message' => 'New Post Created',
                'type' => 'bg-success'
            ]
        );

        return back();
    }
}
