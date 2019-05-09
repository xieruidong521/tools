<?php
namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use App\Http\Requests\RunPhpRequest;

class PhpController extends Controller
{
    const RUN_PATH='tool/php/';
    public function index()
    {
        $initCode='<?php'.PHP_EOL;
        return view('tool.php.ace',compact('initCode'));
    }
    public function run(RunPhpRequest $request)
    {
        $request->makeFilename();
        $file=public_path(self::RUN_PATH.$request->filename);
        file_put_contents($file,$request->run);
        @$runResult=file_get_contents($request->url.$request->filename);
        unlink($file);
        return ['data'=>$runResult];
    }
}