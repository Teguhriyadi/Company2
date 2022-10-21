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
        Schema::create('syarat_ketentuan', function (Blueprint $table) {
            $table->id();
            $table->string("syarat_ketentuan_judul");
            $table->string("syarat_ketentuan_deskripsi");
            $table->tinyInteger("syarat_ketentuan_active")->nullable()->default(0);
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
        Schema::dropIfExists('syarat_ketentuan');
    }
};
