<?php

namespace App\Http\Controllers\Practice;

use App\Model\Links;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Facade;

class ModelController extends Controller
{
    #boot的使用
    public function boot()
    {
        #创建uuid
        /*Links::create([
            'title'  =>'boot',
            'url'    =>'https://www.google.com',
        ]);*/
        //dd(file_get_contents('http://121.42.149.43:7778/index.php/app/getmaincategory'));
        //dd(microtime(true));
        //dd(Carbon::now()->addHour()->timestamp);
        //dd(Carbon::today()->timestamp);
        //dd(Carbon::now()->toDateTimeString());
        //dd($_SERVER);
        //echo Crypt::encrypt(123456);
        //$code=Crypt::encrypt(123);
        return '<a href="'.route('download').'">下载</a>';
    }
    public function admin(Request $request)
    {
        if($request->exists('changemaintenancemode'))
        {
            $message=$request->input('message');
            app()->isDownForMaintenance()?Artisan::call('up'):Artisan::call('down',['--message'=>$message]);
            return redirect(route('admin.system.setting'));
        }
        $maintenanceMode=app()->isDownForMaintenance();
        return view('admin',compact('maintenanceMode'));
    }
}
