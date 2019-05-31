<?php
namespace App\Repositories;

use Earnp\GoogleAuthenticator\Librarys\GoogleAuthenticator as GA;

class GoogleAuthenticator
{
    protected $googleAuth;
    public function __construct(GA $googleAuthenticator)
    {
        $this->googleAuth=$googleAuthenticator;
    }
    public function check($secret,$userCode)
    {
        return $this->googleAuth->verifyCode($secret,$userCode);
    }
    public function create($name)
    {
        $secret=$this->googleAuth->createSecret();
        $url=$this->googleAuth->getQRCodeGoogleUrl($name,$secret,config('google.authenticatorname'));
        return [$secret,$url];
    }
}