<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_tagihan', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uraian');
            $table->string('no_suratpk');
            $table->integer('nilai_tagihan');
            $table->integer('modal_paguyuban');
            $table->integer('modal_pihaklain');
            $table->date('tgl_bayar');
            $table->integer('transfer');
            $table->date('tgl_transfer');
            $table->integer('keuntungan');
            $table->integer('persen_keuntungan');
            $table->string('keterangan');
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
        Schema::dropIfExists('t_tagihan');
    }
}
