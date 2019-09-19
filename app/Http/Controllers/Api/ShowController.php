<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function lists(Request $request)
    {
        $dir=base_path('../');
        $open=opendir($dir);
        $dirs=[];
        while($dir_name=readdir($open)){
            if(in_array($dir_name,['.','..','aaaCrm','b','discuz','xieruidong.top','mine'])||!is_dir($dir.$dir_name)){
                continue;
            }
            $dirs[]=$dir_name;
        }
        return view('api.lists',compact('dirs'));
    }
    public function show($dir,Request $request)
    {
        $api_file=base_path("../$dir/api.md");
        if(!is_file($api_file)){
            return back()->with('info','API文档不存在');
        }
        $md_content=file_get_contents($api_file);
        $md_content=json_encode($md_content,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        return view('api.show',compact('md_content','dir'));
    }
}