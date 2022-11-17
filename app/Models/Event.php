<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getEventTime()
    {
        return Carbon::parse($this->date)->format('d F Y \a\t H:i');
    }

}
