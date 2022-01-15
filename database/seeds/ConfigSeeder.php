<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('configs')->insert([
//            'key' => 'CLIENT_ID',
//            'value' => Str::random(10),
//        ]);
//
//        DB::table('configs')->insert([
//            'key' => 'CLIENT_SECRET',
//            'value' => Str::random(10),
//        ]);
//
//        DB::table('configs')->insert([
//            'key' => 'BOT_NICK',
//            'value' => 'BadzModz',
//        ]);
//
//        DB::table('configs')->insert([
//            'key' => 'CHANNEL_ID',
//            'value' => Str::random(10),
//        ]);

        DB::table('configs')->insert([
            'key' => 'CLIENT_ID',
            'value' => 'aau1o5o0y7qfnjj3a70r5h0ofz0fcw',
        ]);

        DB::table('configs')->insert([
            'key' => 'CLIENT_SECRET',
            'value' => 'px038xo7hkj5yrygo4dc4cysko0b3r',
        ]);

        DB::table('configs')->insert([
            'key' => 'BOT_NICK',
            'value' => 'BadzModz',
        ]);

        DB::table('configs')->insert([
            'key' => 'CHANNEL_ID',
            'value' => '105376710',
        ]);

    }
}
