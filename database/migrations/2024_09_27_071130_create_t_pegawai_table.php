<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kecamatan_id')->unsigned();
            $table->bigInteger('kelurahan_id')->unsigned();
            $table->bigInteger('provinsi_id')->unsigned();
            $table->foreign('kecamatan_id')->references('id')->on('t_kecamatan'); 
            $table->foreign('kelurahan_id')->references('id')->on('t_kelurahan'); 
            $table->foreign('provinsi_id')->references('id')->on('t_provinsi'); 
            $table->string('name');
            $table->string('place_of_birth');
            $table->date('date');
            $table->text('address');
            $table->enum('gender',['0','1']);
            $table->string('religion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pegawai');
    }
};
