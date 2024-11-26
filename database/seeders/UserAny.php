<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAny extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Анастасия',
            'patronymic' => 'Олеговна',
            'email' => ' iskradmitrii@yandex.ru',
            'phone' => '+79787294243',
            'password' => 'Querty!',
            'is_admin' => false
        ]);
    }
}
