<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('annotation');
            $table->foreignId('category_id')->constrained()->references('id')->on('categories')->index('category_id3');
            $table->foreignId('author_id')->constrained()->references('id')->on('authors')->onDelete('cascade')->index('author_id3');
            $table->unsignedInteger('pages');
            $table->string('lang')->index();
            $table->string('image')->nullable();
            $table->string('pdf')->nullable();
            $table->string('pub_place');
            $table->unsignedInteger('pub_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
