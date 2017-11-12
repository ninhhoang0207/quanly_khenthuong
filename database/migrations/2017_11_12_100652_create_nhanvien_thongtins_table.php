<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienThongtinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien_thongtins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('hoten');
            $table->date('ngaysinh');
            $table->tinyInteger('gioitinh');//0-nu, 1-nam
            $table->string('email')->nullable();
            $table->integer('tinh_id');
            $table->integer('huyen_id');
            $table->integer('xa_id');
            $table->string('dantoc');
            $table->string('tongiao')->nullable();
            $table->integer('so_cmnd');
            $table->date('ngaycap_cmnd');
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
        Schema::dropIfExists('nhanvien_thongtins');
    }
}
