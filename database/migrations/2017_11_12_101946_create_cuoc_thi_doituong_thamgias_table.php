<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuocThiDoituongThamgiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuoc_thi_doituong_thamgias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuocthi_id');
            $table->smallInteger('doituong_thamgia');//xa huyen ca nhan ban nganh
            $table->integer('doituong_id');
            $table->smallInteger('mucdo_xetduyet');
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
        Schema::dropIfExists('cuoc_thi_doituong_thamgias');
    }
}
