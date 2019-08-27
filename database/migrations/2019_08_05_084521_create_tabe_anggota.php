<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabeAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_anggota', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_anggota')->nullable();
            $table->string('unit_id')->nullable();
            $table->integer('user_id')->foreign()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_gabung')->nullable();
            $table->integer('no_rekening')->nullable();
            $table->string('nipen')->nullable();
            $table->string('no_induk')->nullable();
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
        Schema::dropIfExists('t_anggota');
    }
}
