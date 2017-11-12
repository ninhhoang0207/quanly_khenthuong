<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuocThisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuoc_this', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->date('thoihan_thamgia');
            $table->tinyInteger('loaihinh');//0-ca nhan, 1-to chuc
            $table->smallInteger('ban_tochuc');
            $table->boolean('batbuoc');
            $table->double('giaithuong');
            $table->text('mota')->nullable();
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
        Schema::dropIfExists('cuoc_this');
    }
}
