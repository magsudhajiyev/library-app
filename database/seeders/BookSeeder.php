<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {

            Book::insert([
                [
                    'ISBN' => $faker->isbn10(),
                    'title' => 'Book Title - '. $i,
                    'year' => $faker->year(),
                    'language' => $faker->languageCode(),
                    'author_id' => $i
                ]
            ]);
        }
    }
}
