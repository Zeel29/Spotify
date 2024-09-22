<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums_songs', function (Blueprint $table) {
            $table->BigIncrements('id'); 
            $table->unsignedBigInteger('albumss_a_id');
            $table->unsignedBigInteger('songs_s_id');
            $table->foreign('albumss_a_id')->references('a_id')->on('albumss')->onDelete('cascade');
            $table->foreign('songs_s_id')->references('s_id')->on('songs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums_songs');
    }
}
