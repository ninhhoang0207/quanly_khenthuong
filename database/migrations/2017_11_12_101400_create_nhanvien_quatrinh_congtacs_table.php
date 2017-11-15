<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienQuatrinhCongtacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien_quatrinh_congtac', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('tu_ngay');
            $table->date('den_ngay');
            $table->string('congviect');
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
        Schema::dropIfExists('nhanvien_quatrinh_congtac');
    }
}
