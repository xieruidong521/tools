<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table='user_info';
    public $timestamps=false;

    public function imChatUser()
    {
        return $this->belongsTo(ImChatUser::class,'username');
    }
}