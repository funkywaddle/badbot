<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->insert([
        //    'name' => 'Quality Coder',
        //    'email' => 'qc@qualitycoder.net',
        //    'password' => Hash::make('8letters')
        //]);
	DB::table('users')->insert([
	    'name' => 'Bad Habitz',
	    'email' => 'badhabits@gmail.com',
	    'password' => Hash::make('BAD1!ONE1!BAD')
	]);
    }
}
