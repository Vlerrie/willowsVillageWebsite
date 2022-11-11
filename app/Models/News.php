<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    public function getPublished()
    {
        return Carbon::parse($this->published)->format('d F Y');
    }
}
