<?php
namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;

class RedisController extends Controller
{
    public function index()
    {
        $redis=app('redis');
        $redis->select(10);
        dd($redis->hExists('hash','addr1'));
    }
}