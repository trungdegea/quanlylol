<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhviens', function (Blueprint $table) {
            $table->increments('MaTV');
            $table->string('TenTV');
            $table->string('ViTri');
            $table->integer('MaDoi');
            $table->integer('MaDoi');
            $table->timestamps();
            $table->foreign('MaDoi')
            ->references('MaDoi')->on('dois')
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
        Schema::dropIfExists('thanh_viens');
    }
}
