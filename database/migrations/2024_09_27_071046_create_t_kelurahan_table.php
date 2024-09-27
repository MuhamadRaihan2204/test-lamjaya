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
        Schema::create('t_kelurahan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kecamatan_id')->unsigned();
            $table->foreign('kecamatan_id')->references('id')->on('t_kecamatan'); 
            $table->string('code');
            $table->string('name');
            $table->enum('status', ['0','1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kelurahan');
    }
};
