<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=10;$i++)
        {
            \App\Model\Users::create([
                'no'          =>mt_rand(100000,1000000),
                'googlesecret'=>\Illuminate\Support\Str::random('10')
            ]);
        }
    }
}
