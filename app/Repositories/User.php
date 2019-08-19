<?php
namespace App\Repositories;

use App\Model\Users;

class User
{
    protected $user;
    public function __construct(Users $user)
    {
        $this->user=$user;
    }

    /**
     * @param $no
     * @return mixed
     */
    public function findByNo($no)
    {
        return $this->user->where('no',$no)->first();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->user->findOrFail($id);
    }
    public function bindGoogleAuthenticator($source_code,$user)
    {
        $user->googlesecret=$source_code;
        return $user->save();
    }

    /**
     * 创建用户
     * @param $no int 编号
     * @return mixed
     */
    public function create($no)
    {
        return $this->user->create([
            'no'   => $no,
        ]);
    }
}