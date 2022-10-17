<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_pesan', function (Blueprint $table) {
            $table->id();
            $table->string("step_pesan_judul");
            $table->string("step_pesan_deskripsi");
            $table->integer("step_pesan_first");
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
        Schema::dropIfExists('step_pesan');
    }
};
