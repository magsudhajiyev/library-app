<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLendingsTable extends Migration
{
    public function up()
    {
        Schema::create('book_lendings', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('librarian_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('book_item_id')->constrained()->onDelete('CASCADE');
            $table->timestamp('issue_date');
            // $table->timestamp('return_date');
            $table->boolean('status')->default(true);
            $table->timestamp('created_at')->default(now());
            $table->index(['user_id', 'book_item_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_lendings');
    }
}
