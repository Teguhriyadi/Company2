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
        Schema::create('jasa_token', function (Blueprint $table) {
            $table->id();
            $table->string("kode_token");
            $table->integer("user_id");
            $table->integer("created_by");
            $table->integer("jasa_id");
            $table->integer("produk_id");
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
        Schema::dropIfExists('jasa_token');
    }
};
