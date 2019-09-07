<?php
namespace App\Repositories\Contract;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserInterface
{
    #获取用户列表
    public function getUserLists($limit):LengthAwarePaginator;
    #获取用户地址
    public function getAddresses($username):Collection;
}