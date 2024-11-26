<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Dmitriy',
            'patronymic' => 'Валентинович',
            'email' => 'dmitriyiskra@mail.ru',
            'phone' => '+79787243637',
            'password' => 'Querty!',
            'is_admin' => true
        ]);
    }
}
