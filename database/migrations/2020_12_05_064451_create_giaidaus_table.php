<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaidausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaidaus', function (Blueprint $table) {
            $table->increments('MaGD');
            $table->string('TenGD');
            $table->integer('SLdoi');
            $table->dateTime('TGBD');
            $table->dateTime('TGKT');
            $table->integer('SLve');
            $table->integer('MaUser')->unsigned();
            $table->timestamps();
            $table->foreign('MaUser')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('giaidaus');
    }
}
