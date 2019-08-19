<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoogleAuthenticatorBindRequest;
use App\Repositories\User;
use App\Repositories\GoogleAuthenticator;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    protected $user;
    protected $googleAuth;
    public function __construct(User $user,GoogleAuthenticator $googleAuthenticator)
    {
        $this->user=$user;
        $this->googleAuth=$googleAuthenticator;
    }

    public function bind($no)
    {
        $user=$this->user->findByNo($no);
        if(!$user)
        {
            $user=$this->user->create($no);
        }
        if($user->googlesecret)
        {
            return redirect('google/check/'.$no);
        }
        list($secret,$codeurl)=$this->googleAuth->create($user?$user->no:$no);
        return view('google.bind',compact('user','secret','codeurl'));
    }
    public function addBind($no,GoogleAuthenticatorBindRequest $request)
    {
        $user=$this->user->findByNo($no);
        if(!$this->googleAuth->check($request->source_code,$request->user_code))
        {
            return back()->with('error','验证码有误，请重新输入');
        }
        $this->user->bindGoogleAuthenticator($request->source_code,$user);
        return back();
    }
    public function check($no)
    {
        return view('google.check');
    }
    public function makeCheck($no,Request $request)
    {
        $user=$this->user->findByNo($no);
        if($this->googleAuth->check($user->googlesecret,$request->code))
        {
            return back()->with('success','验证成功');
        }
        else
        {
            return back()->with('error','验证失败');
        }
    }
}
