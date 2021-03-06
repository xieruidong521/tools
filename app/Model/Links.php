<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Links extends Model
{
    protected $table='links';
    protected $guarded=[];
    const UPDATED_AT = 'u_time';
    const CREATED_AT = 'w_time';
    public $dateFormat='U';

    //boot方法代替覆盖默认行为
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model){
            $model->image=Uuid::uuid1()->getHex();
        });
    }
}
