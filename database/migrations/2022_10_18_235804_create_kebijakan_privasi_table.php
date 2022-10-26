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
        Schema::create('kebijakan_privasi', function (Blueprint $table) {
            $table->id();
            $table->string("kebijakan_judul", 100);
            $table->text("kebijakan_deskripsi");
            $table->tinyInteger("kebijakan_first")->nullable()->default(0);
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
        Schema::dropIfExists('kebijakan_privasi');
    }
};
