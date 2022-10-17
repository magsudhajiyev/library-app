<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'name' => 'Test',
                'surname' => 'User',
                'email' => 'test.user@mail.com',
                'card_number' => 'TST123',
                'api_token' => 'YHEt7CNf1SBmQs6JbTPf7qMK8FgnynI5SiPmyJELrbAO61heKy0eKuiXrxBJ',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
