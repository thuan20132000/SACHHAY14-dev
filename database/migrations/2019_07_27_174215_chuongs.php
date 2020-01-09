<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chuongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('chuongs', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->bigInteger('id_sach');
            $table->foreign('id_sach')->references('id')->on('sachs');
            $table->integer('chuong');
            $table->string('tenchuong');
            $table->longtext('noidung');
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
        //
        Schema::dropIfExists('chuongs');
    }
}
