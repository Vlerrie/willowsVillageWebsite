<?php


namespace App\ServiceProvider;


use App\Models\Event;
use Carbon\Carbon;

class VisibleEventItems
{
    public function getVisibleItems()
    {
        $fromDate = Carbon::now('Africa/Johannesburg')->subHour();
        return Event::where('date', '>', $fromDate)
            ->orderBy('date', 'asc')
            ->get();
    }
}
