<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

        User::create([
            'username' => '11817284',
            'password' => Hash::make('password'),
            'userlevel' => 'Student',

        ]);

        User::create([
            'username' => '11819021',
            'password' => Hash::make('password'),
            'userlevel' => 'Student',

        ]);

        User::create([
            'username' => '11818167',
            'password' => Hash::make('codemoto'),
            'userlevel' => 'Student',

        ]);

        User::create([
            'username' => '11818518',
            'password' => Hash::make('jollymorningmamser'),
            'userlevel' => 'Student',

        ]);
    }

}
