<?php

use Illuminate\Database\Seeder;
use App\Login;

class LoginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Login::create([
        	'username' => 'lsoadmin',
        	'password' => Hash::make('password'),
        	'userlevel' => 'Administrator',

        ]);
    }
}
