<?php

namespace App\Providers;

use App\Repositories\ImChatUser;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contract\UserInterface;
use App\Model\ImChatUser as ImChatUserModel;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserInterface::class,function(){
            return new ImChatUser(new ImChatUserModel());
        });
    }
}
