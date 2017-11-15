<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoituongDoatgiaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doituong_doatgiai', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('doituong');
            $table->integer('doituong_id');
            $table->integer('cuocthi_id');
            $table->text('ghichu')->nullable();
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
        Schema::dropIfExists('doituong_doatgiai');
    }
}
