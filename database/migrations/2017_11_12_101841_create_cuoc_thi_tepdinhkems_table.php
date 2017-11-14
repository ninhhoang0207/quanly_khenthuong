<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuocThiTepdinhkemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuoc_thi_tepdinhkem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuocthi_id');
            $table->string('ten_tep');
            $table->string('url');
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
        Schema::dropIfExists('cuoc_thi_tepdinhkem');
    }
}
