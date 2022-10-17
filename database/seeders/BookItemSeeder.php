<?php

namespace Database\Seeders;

use App\Models\BookItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookItemSeeder extends Seeder
{
    public function run()
    {

        for ($i = 1; $i <= 10; $i++) {

            BookItem::insert([
                [
                    'book_id' => $i,
                    'barcode' => Str::uuid()
                ]
            ]);
        }
    }
}
