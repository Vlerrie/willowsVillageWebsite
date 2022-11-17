<?php


namespace App\ServiceProvider;

use App\Models\News;
use Carbon\Carbon;

class VisibleNewsItems
{
    private $amountOfItems = 10;

    public function setAmount(int $amount)
    {
        $this->amountOfItems = $amount;
    }

    public function getVisibleItems()
    {
        return News::whereNotNull('published')
            ->where('published', '<', Carbon::now('Africa/Johannesburg'))
            ->orderBy('published', 'desc')
            ->take($this->amountOfItems)
            ->get();
    }
}
