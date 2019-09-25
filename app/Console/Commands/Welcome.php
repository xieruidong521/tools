<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Welcome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'welcome:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '欢迎信息';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name=$this->ask('请输入你的名字');
        $pwd=$this->secret('input your password');
        if($pwd!=123)
        {
            $this->error('error password');
            exit;
        }
        $county=$this->choice('where are you from?',['japan','china','kor','german']);
        $table_header=['name','password','from'];
        $table_data=[
            [$name,$pwd,$county]
        ];
        if($this->confirm('sure make file about you?'))
        {
            $total_progress=10;
            $progress=0;
            $this->output->progressStart($total_progress);
            while ($progress<$total_progress)
            {
                sleep(1);
                $progress++;
                $this->output->progressAdvance();
            }
            $this->output->progressFinish();

            file_put_contents('D:/'.$name.'.log','name:'.$name.PHP_EOL.'password:'.$pwd.PHP_EOL.'county:'.$county);
            $this->info('success');
            $this->table($table_header,$table_data);
        }
    }
}
