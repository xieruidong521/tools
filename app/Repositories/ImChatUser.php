<?php
namespace App\Repositories;

use App\Repositories\Contract\UserInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Model\ImChatUser as UserModel;
use Illuminate\Pagination\LengthAwarePaginator;

class ImChatUser implements UserInterface
{
    /**
     * @var UserModel
     */
    protected $user;

    /**
     * ImChatUser constructor.
     * @param UserModel $user
     */
    public function __construct(UserModel $user)
    {
        $this->user=$user;
    }
    public function getUserLists($limit): LengthAwarePaginator
    {
        return $this->user->select([
            'id',
            'project_appid as appid',
            'username',
            'logo',
        ])
            ->orderBy('id','desc')
            ->paginate($limit);
    }
    public function getAddresses($username): Collection
    {
        $user=$this->user->where('username',$username)->first();

        return $user->addresses;
    }
}