<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        $user = User::find(1);
        $user->admin = 1;
        $user->save();

        $news = [];
        if (Auth::check()) {
            $news = News::whereNotNull('published')
                ->where('published', '<', Carbon::now('Africa/Johannesburg'))
                ->take(10)
                ->get();
        }

        return view('welcome', [
            'news' => $news
        ]);
    }
}
