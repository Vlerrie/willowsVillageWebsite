<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\ServiceProvider\VisibleEventItems;
use App\ServiceProvider\VisibleNewsItems;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $accounts = User::all();
        $events = new VisibleEventItems();
        $events = $events->getVisibleItems();
        $news = new VisibleNewsItems();
        $news = $news->getVisibleItems();

        return view('admin.adminDashboard', [
            'accounts' => $accounts,
            'events' => $events,
            'news' => $news
        ]);
    }
}
