<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangxephangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangxephangs', function (Blueprint $table) {
            $table->increments('MaBXH');
            $table->integer('MaDoi');
            $table->integer('XepHang');
            $table->integer('MaGD');
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
        Schema::dropIfExists('bangxephangs');
    }
}
