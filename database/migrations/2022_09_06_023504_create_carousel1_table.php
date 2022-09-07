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
        Schema::create('carousel1', function (Blueprint $table) {
            $table->id();
            $table->string("foto");
            $table->string("icon")->nullable();
            $table->string("deksripsi")->nullable();
            $table->string("nm_link")->nullable();
            $table->string("link")->nullable();
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
        Schema::dropIfExists('carousel1');
    }
};
