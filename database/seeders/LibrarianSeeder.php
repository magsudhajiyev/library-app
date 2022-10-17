<?php

namespace Database\Seeders;

use App\Models\Librarian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LibrarianSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i <= 10; $i++) {

            Librarian::insert([
                [
                    'name' => 'Librarian -'. $i,
                    'surname' => 'LibSurname -'. $i,
                    'email' => $faker->email(),
                    'password' => Hash::make('password'),
                    'working_days' => $i % 2 == 0 ? '2,4,5' : '1,3,5,7'
                ]
            ]);
        }
    }
}
