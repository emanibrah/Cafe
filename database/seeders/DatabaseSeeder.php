<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin',
               'username'=>'Admin',
               'email'=>'admin@eman.com',
               'active'=>1,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'User',
               'username'=>'User',
               'email'=>'user@eman.com',
               'active'=>0,
               'password'=> bcrypt('12345678'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
