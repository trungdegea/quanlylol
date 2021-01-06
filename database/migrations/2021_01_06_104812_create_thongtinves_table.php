<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongtinvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtinves', function (Blueprint $table) {
            $table->increments('MaVe');
            $table->string('TenKhach');
            $table->string('SDT');
            $table->integer('SoVe');
            $table->integer('TongTien');
            $table->integer('MaGD');
            $table->foreign('MaGD')
            ->references('id')->on('giaidaus')
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
        Schema::dropIfExists('thongtinves');
    }
}
