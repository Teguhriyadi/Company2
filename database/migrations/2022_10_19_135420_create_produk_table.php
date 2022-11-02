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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->integer("kategori_id")->nullable();
            $table->integer("kategori_jasa_id")->nullable();
            $table->string("produk_image")->nullable();
            $table->string("produk_judul", 100);
            $table->string("produk_slug");
            $table->integer("produk_harga");
            $table->string("produk_deskripsi_singkat", 100);
            $table->text("produk_deskripsi");
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
        Schema::dropIfExists('produk');
    }
};
