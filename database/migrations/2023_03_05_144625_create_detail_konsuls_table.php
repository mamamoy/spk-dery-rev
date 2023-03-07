<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKonsulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_konsuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gejala_id');
            $table->foreign('gejala_id')->references('id')->on('gejalas')->cascadeOnDelete();
            $table->unsignedBigInteger('konsul_id');
            $table->foreign('konsul_id')->references('id')->on('konsuls')->cascadeOnDelete();
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
        Schema::dropIfExists('detail_konsuls');
    }
}
