<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sachs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sachs', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->primary('id');
            $table->string('tensach');
            $table->text('tenkhongdau');
            $table->string('tacgia')->nullable(true);
            $table->string('hinhanh');
            $table->integer('dadoc')->nullable(true);
            $table->integer('yeuthich')->nullable(true);
            $table->boolean('noibat')->nullable(true);
            $table->boolean('moicapnhat')->nullable(true);
            $table->boolean('docnhieu')->nullable(true);
            $table->string('chuthich')->nullable(true);
            $table->bigInteger('id_theloai');
            $table->foreign('id_theloai')->references('id')->on('theloais');
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
        Schema::dropIfExists('sachs');
    }
}
