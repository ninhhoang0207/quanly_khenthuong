<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienNguoithansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien_nguoithan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('quanhe');//vo chong, anh chi em ruot, con cai, bo me
            $table->string('hoten');
            $table->date('namsinh');
            $table->string('nguyenquan');
            $table->string('diachi');
            $table->string('nghenghiep');
            $table->string('diachi_congtac');
            $table->string('sdt')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('nhanvien_nguoithan');
    }
}
