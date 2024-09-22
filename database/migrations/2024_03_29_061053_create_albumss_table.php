<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albumss', function (Blueprint $table) {
            $table->BigIncrements('a_id'); //primary key 
            $table->string('a_name');
            $table->string('image_path');
            $table->string('description');
            $table->unsignedBigInteger('s_id');
            $table->foreign('s_id')->references('s_id')->on('songs')->onDelete('cascade');
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
        Schema::dropIfExists('albumss');
    }
}
