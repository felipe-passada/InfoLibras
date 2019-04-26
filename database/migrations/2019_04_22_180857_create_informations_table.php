<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->unsignedInteger('sugestion_id');
            $table->unsignedBigInteger('interpreter_id');
            $table->foreign('interpreter_id')
                ->references('id')
                ->on('users');
            $table->foreign('sugestion_id')
                ->references('id')
                ->on('sugestions');
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
        Schema::dropIfExists('information');
    }
}
