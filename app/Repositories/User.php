<?php
namespace App\Repositories;

use App\Model\Users;

class User
{
    public function __construct()
    {
    }

    /**
     * @param $no
     * @return mixed
     */
    public function findByNo($no)
    {
        return Users::where('no',$no)->firstOrFail();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Users::findOrFail($id);
    }
    public function bindGoogleAuthenticator($source_code,$user)
    {
        $user->googlesecret=$source_code;
        return $user->save();
    }
}