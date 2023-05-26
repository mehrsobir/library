<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journalinfos', function (Blueprint $table) {
            $table->id();
            $table->string('title_tg');
            $table->longText('body_tg');
            $table->string('title_ru');
            $table->longText('body_ru');
            $table->string('title_en');
            $table->longText('body_en');
            $table->string('image');
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
        Schema::dropIfExists('journalinfos');
    }
}
