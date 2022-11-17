<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\User;
use App\ServiceProvider\VisibleEventItems;
use App\ServiceProvider\VisibleNewsItems;
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
            $news = new VisibleNewsItems();
            $news = $news->getVisibleItems();

            $events = new VisibleEventItems();
            $events = $events->getVisibleItems();
        }

        return view('welcome', [
            'news' => $news,
            'events' => $events
        ]);
    }
}
