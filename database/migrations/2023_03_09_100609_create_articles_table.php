<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('annotation');
            $table->text('keywords');
            $table->foreignId('category_id')->constrained()->references('id')->on('categories')->index('category_id');
            $table->foreignId('author_id')->constrained()->references('id')->on('authors')->onDelete('cascade')->index('author_id');
            $table->unsignedInteger('pages');
            $table->string('lang')->index();
            $table->string('pdf');
            $table->string('pub_place')->nullable();
            $table->date('pub_date')->nullable();
            $table->string('pub_link')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
