<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetCategory implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url='http://www.kuaidi100.com/query?type=yuantong&postid=';
        for($i=1;$i<=100;$i++)
        {
            $nu=mt_rand(111111111,999999999);
            $res=file_get_contents($url.$nu);
            file_put_contents('D:/'.$nu.'.log',$res);
        }
    }
}
