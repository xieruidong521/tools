<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $dateFormat='U';

    public function getCreatedAtAttribute($timestamp)
    {
        return Carbon::createFromTimestamp($timestamp)->diffForHumans();
    }
}
