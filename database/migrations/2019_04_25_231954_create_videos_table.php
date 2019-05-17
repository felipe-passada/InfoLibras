<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('formato');
            $table->string('thumbnail');
            $table->string('path');
            $table->unsignedBigInteger('audio_visual_id');
            $table->unsignedInteger('solicitation_id');
            $table->foreign('audio_visual_id')
                ->references('id')
                ->on('users');
            $table->foreign('solicitation_id')
                ->references('id')
                ->on('solicitations');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
