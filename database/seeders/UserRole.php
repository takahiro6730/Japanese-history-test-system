<?php

namespace Database\Seeders;

use App\Models\User_role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User_role::create([
            'name'=>'管理者'
        ]);
        User_role::create([
            'name'=>'ユーザー'
        ]);
    }
}
