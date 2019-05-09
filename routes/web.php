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
Route::get('/',function(){phpinfo();});
//工具类
Route::group(['prefix'=>'tool','namespace'=>'Tool'],function(){
    Route::get('/run/php','PhpController@index');
    Route::post('/run/php','PhpController@run')->name('tool.run.php');
});
