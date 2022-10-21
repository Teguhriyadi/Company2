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
        Schema::create('profil_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string("profil_nama", 100);
            $table->string("profil_singkat", 100);
            $table->text("profil_deskripsi");
            $table->string("profil_no_hp", 30);
            $table->string("profil_email", 100);
            $table->text("profil_alamat");
            $table->string("profil_foto");
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
        Schema::dropIfExists('profil_perusahaan');
    }
};
