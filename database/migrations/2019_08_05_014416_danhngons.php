<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Danhngons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('danhngons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tienganh')->nullable();
            $table->string('chuthich')->nullable();
            $table->string('tiengviet')->nullable();
           $table->string('noibat')->nullable();
            
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
        Schema::dropIfExists('danhngons');
    }
}
