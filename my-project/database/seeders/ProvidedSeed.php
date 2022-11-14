<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Enum\UserRoleEnum;

class ProvidedSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@seed.test',
            'password' => Hash::make('user'),
            'surname' => 'Tester',
            'nickname' => 'tinyuser',
            'username' => 'testeruse',
            'phone' => '123456789',
            'adress' => 'user\'s 1',
            'city' => 'usercity',
            'state' => 'userland',
            'zip' => '11111',
            'role' => UserRoleEnum::USER
        ]);

        User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@seed.test',
            'password' => Hash::make('moderator'),
            'surname' => 'Tester',
            'nickname' => 'littlemoderator',
            'username' => 'testermod',
            'phone' => '222222222',
            'adress' => 'moderns 22',
            'city' => 'moderncity',
            'state' => 'modernoland',
            'zip' => '22222',
            'role' => UserRoleEnum::MODERATOR
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@seed.test',
            'password' => Hash::make('admin'),
            'surname' => 'Tester',
            'nickname' => 'bigadmin',
            'username' => 'testeradm',
            'phone' => '9999999999',
            'adress' => 'heaven line 7',
            'city' => 'Heaven city',
            'state' => 'heaven',
            'zip' => '66666',
            'role' => UserRoleEnum::ADMIN
        ]);
    }
}
