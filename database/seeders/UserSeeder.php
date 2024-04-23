<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'maeda',
            'email' => 'takahasihideo.g@gmail.com',
            'password' => Hash::make('10210730'),
            'user_role'=>'1'
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.jp',
            'password' => Hash::make('10210730'),
            'user_role'=>'1'
        ]);
        User::create([
            'name' => 'testuser',
            'email' => 'user@test.jp',
            'password' => Hash::make('usertest'),
            'user_role'=>'2'
        ]);
    }
}