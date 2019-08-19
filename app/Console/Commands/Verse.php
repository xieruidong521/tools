<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Verse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '随机赠送美妙的诗句';

    protected $verses=[
        '此情可待成追忆 只是当时已惘然',
        '锦瑟无端五十弦 一弦一柱思华年',
        '忽如一夜春风来 千树万树梨花开',
        '莫愁前路无知己 天下谁人不识君',
        '人生若只如初见 何事秋风悲画扇',
        '衣带渐宽终不悔 为伊消得人憔悴',
        '但愿人长久 千里共婵娟',
        '桃花潭水深千尺 不及汪伦送我情',
        '落红不是无情物 化作春泥更护花',
        '身无彩凤双飞翼 心有灵犀一点通',
        '相见时难别亦难 东风无力百花残',
        '沧海月明珠有泪 蓝田日暖玉生烟',
    ];

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
        $verse=$this->verses[array_rand($this->verses)];
        $this->info($verse);
    }
}
