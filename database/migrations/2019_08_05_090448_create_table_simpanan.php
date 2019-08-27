<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSimpanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_simpanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_anggota')->foreign()->references('id')->on('t_anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('simpanan_pokok')->nullable();
            $table->integer('dana_kembali')->nullable();
            $table->integer('simpanan_wajib')->nullable();
            $table->integer('simpanan_sukarela')->nullable();
            $table->integer('angsuran')->nullable();
            $table->integer('jasa')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('t_simpanan');
    }
}
