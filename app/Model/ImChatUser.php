<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImChatUser extends Model
{
    protected $table='im_chat_user';
    public $timestamps=false;

    public function addresses()
    {
        return $this->hasMany(CoinAddress::class,'username','username');
    }
    public function userInfo()
    {
        return $this->hasOne(UserInfo::class,'username','username');
    }
}