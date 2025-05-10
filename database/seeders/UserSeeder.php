<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // بيانات المستخدم
        $user = [
            'name' => 'Ibrahim Sadour',
            'email' => 'i.m.s.1995@hotmail.com',
            'mobile' => '0685125822',
            'password' => Hash::make('Mustafa@2023@'),
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(60),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        // إدخال المستخدم إلى قاعدة البيانات
        User::create($user);
    }
}
