<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CoinAddress extends Model
{
    protected $table='coin_address';
    public $timestamps=false;

    public function imChatUser()
    {
        return $this->belongsTo(ImChatUser::class,'username','username');
    }
}
