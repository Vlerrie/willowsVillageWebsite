<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getPublished()
    {
        return Carbon::parse($this->published)->format('d F Y');
    }
}
