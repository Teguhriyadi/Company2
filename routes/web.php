<?php

use App\Http\Controllers\Akun\RoleController;
use App\Http\Controllers\Akun\UserController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Pengaturan\ProfilPerusahaanController;
use App\Http\Controllers\Produk\ProdukController;
use App\Http\Controllers\Spesialisasi_Kami\SpesialisasiKamiController;
use App\Http\Controllers\Layanan\LayananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/template_admin", function () {
    return view("pages.layouts.main");
});
Route::prefix("admin")->group(function () {
    Route::get("/login", [LoginController::class, "login"]);

    Route::get("/dashboard", [AppController::class, "dashboard"]);

    Route::prefix("master")->group(function () {
        Route::resource("kategori", KategoriController::class);
    });

    Route::prefix("pengaturan")->group(function () {
        Route::resource("profil_perusahaan", ProfilPerusahaanController::class);
    });

    Route::prefix("akun")->group(function () {

        Route::get("/users/edit", [UserController::class, "edit"]);
        Route::put("/users/simpan", [UserController::class, "update"]);
        Route::resource("users", UserController::class);

        Route::get("/role/edit", [RoleController::class, "edit"]);
        Route::put("/edit/simpan", [RoleController::class, "update"]);
        Route::resource("role", RoleController::class);
    });


    Route::prefix("proyek")->group(function () {
        Route::get("/", [ProdukController::class, "index"]);
    });

    Route::prefix("spesialisasi_kami")->group(function () {
        Route::get("/", [SpesialisasiKamiController::class, "index"]);
    });

    Route::prefix("layanan")->group(function () {
        Route::get("/", [LayananController::class, "index"]);
    });

});
