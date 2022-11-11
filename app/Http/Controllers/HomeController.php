<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function dashboard()
    {
//        $user = User::find(1);
//        $user->admin = 1;
//        $user->save();

        $news = [];
        $events = [];
        if (Auth::check()) {
            $news = News::whereNotNull('published')
                ->where('published', '<', Carbon::now('Africa/Johannesburg'))
                ->orderBy('published', 'desc')
                ->take(10)
                ->get();

            $fromDate = Carbon::now('Africa/Johannesburg')->subHour();
            $events = Event::where('date', '>', $fromDate)
                ->orderBy('date', 'asc')
                ->get();
        }

        return view('welcome', [
            'news' => $news,
            'events' => $events
        ]);
    }
}
