<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gejala_id');
            $table->foreign('gejala_id')->references('id')->on('gejalas')->cascadeOnDelete();
            $table->unsignedBigInteger('penyakit_id');
            $table->foreign('penyakit_id')->references('id')->on('penyakits')->cascadeOnDelete();
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
        Schema::dropIfExists('relasis');
    }
}
