<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_rents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->references('id')->on('books')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            // $table->boolean('returned');
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
        Schema::dropIfExists('book_rents');
    }
}
