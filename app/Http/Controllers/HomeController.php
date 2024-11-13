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
        $events = new VisibleEventItems();
        $events = $events->getVisibleItems();

        return view('welcome', [
            'events' => $events
        ]);
    }

    public function news()
    {
        $news = new VisibleNewsItems();
        $news = $news->getVisibleItems();

        $events = new VisibleEventItems();
        $events = $events->getVisibleItems();

        return view('pages.news', [
            'news' => $news,
            'events' => $events
        ]);
    }
}
