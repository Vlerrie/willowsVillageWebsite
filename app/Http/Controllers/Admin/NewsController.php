<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create(Request $request)
    {
        $publish = null;
        if (isset($request->publish)){
            $publish = Carbon::now('Africa/Johannesburg');
        }
        News::create([
            'subject' => $request->title,
            'body' => $request->body,
            'published' => $publish
        ]);

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
