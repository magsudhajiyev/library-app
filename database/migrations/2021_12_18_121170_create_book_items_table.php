<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookItemsTable extends Migration
{
    public function up()
    {
        Schema::create('book_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->string('barcode')->unique();
            $table->boolean('borrowed')->default(false);
            $table->index(['book_id', 'barcode']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_items');
    }
}
