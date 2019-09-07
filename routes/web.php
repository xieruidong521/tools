<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Route::get('/','Practice\ModelController@boot');
Route::get('/','Practice\DownloadController@index')->name('download');
//工具类
Route::group(['prefix'=>'tool','namespace'=>'Tool'],function(){
    Route::get('/run/php','PhpController@index');
    Route::post('/run/php','PhpController@run')->name('tool.run.php');
});
Route::get('admin/system/setting','Practice\ModelController@admin')->name('admin.system.setting');

//谷歌验证器
Route::group(['prefix'=>'google','namespace'=>'Practice'],function(){
    //绑定
    Route::get('bind/{no}','GoogleController@bind');
    Route::post('bind/{no}','GoogleController@addBind');
    //检查
    Route::get('check/{no}','GoogleController@check');
    Route::post('check/{no}','GoogleController@makeCheck');

    #谷歌验证码
    Route::resource('/recaptcha',"RecaptchaController");
});

Route::group(['prefix'=>'func','namespace'=>'Practice'],function (){
    Route::get('test','FuncController@index');
    Route::get('redis','RedisController@index');
});

Route::get('user/list','UserController@lists');
Route::get('user/addresses','UserController@addresses');