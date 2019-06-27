<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index()
    {
        $dir='C:\Users\Administrator\Videos\\';
        $open=opendir($dir);
        $movies=[];
        while(($file=readdir($open))!==false)
        {
            if(strpos($file,'.mp4')!==false)
            {
                $movies[]=$file;
            }
        }
        $filename=$movies[array_rand($movies)];
        $pathfilename=$dir.$filename;
        if(!is_file(public_path('static/video/'.$filename)))
        {
            copy($pathfilename,public_path('static/video/'.$filename));
        }
        return view('download.movie.play',compact('filename'));
    }
}
