<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichthidausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichthidaus', function (Blueprint $table) {
            $table->increments('MaLTD');
            $table->integer('MaDoi1');
            $table->integer('MaDoi2');
            $table->integer('KQ1');
            $table->integer('KQ2');
            $table->dateTime('ThoiGian');
            $table->integer('MaGD')->unsigned();
            $table->foreign('MaGD')
            ->references('MaGD')->on('giaidaus')
            ->onDelete('cascade');
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
        Schema::dropIfExists('lichthidaus');
    }
}
