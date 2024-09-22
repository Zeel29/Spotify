<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->BigIncrements('s_id');//primary key
            $table->string('s_name');
            $table->string('s_image');
            $table->string('song_path');
            $table->integer('duration');
            $table->unsignedBigInteger('art_id');
            $table->foreign('art_id')->references('art_id')->on('artists')->onDelete('cascade');
            
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
        Schema::dropIfExists('songs');
    }
}
