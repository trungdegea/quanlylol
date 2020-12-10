<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dois', function (Blueprint $table) {
            $table->increments('MaDoi');
            $table->string('TenDoi');
            $table->integer('SLTV');
            $table->integer('Diem');
            $table->integer('TranThang');
            $table->integer('TranThua');
            $table->integer('MaGD')->unsigned();
            $table->string('img');
            $table->timestamps();
            $table->foreign('MaGD')
                    ->references('MaGD')->on('giaidaus')
                    ->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dois');
    }
}
