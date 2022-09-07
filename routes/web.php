<?php

use App\Http\Controllers\Akun\RoleController;
use App\Http\Controllers\Akun\UserController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\Master\ClientController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Master\ServicesController;
use App\Http\Controllers\Pengaturan\ProfilPerusahaanController;
use App\Http\Controllers\Pengaturan\PesanController;
use App\Http\Controllers\Pengaturan\TeamController;
use App\Http\Controllers\Pengaturan\TestimonialController;
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
    return view('app');
});

Route::get("/template_admin", function () {
    return view("pages.layouts.main");
});
Route::prefix("admin")->group(function () {
    Route::get("/login", [LoginController::class, "login"]);

    Route::get("/dashboard", [AppController::class, "dashboard"]);

    Route::prefix("master")->group(function () {
        Route::get("/kategori/edit", [KategoriController::class, "edit"]);
        Route::put("/kategori/simpan", [KategoriController::class, "update"]);
        Route::resource("kategori", KategoriController::class);
        Route::get("/services/edit", [ServicesController::class, "edit"]);
        Route::put("/services/simpan", [ServicesController::class, "update"]);
        Route::resource("services", ServicesController::class);
        Route::get("/client/edit", [ClientController::class, "edit"]);
        Route::put("/client/simpan", [ClientController::class, "update"]);
        Route::resource("client", ClientController::class);
    });

    Route::prefix("pengaturan")->group(function () {
        Route::resource("profil_perusahaan", ProfilPerusahaanController::class);
        Route::get("/team/edit", [TeamController::class, "edit"]);
        Route::get("/team/simpan", [TeamController::class, "update"]);
        Route::resource("team", TeamController::class);
        Route::resource("testimonial", TestimonialController::class);
        Route::resource("pesan", PesanController::class);
    });

    Route::prefix("akun")->group(function () {

        Route::get("/users/edit", [UserController::class, "edit"]);
        Route::put("/users/simpan", [UserController::class, "update"]);
        Route::resource("users", UserController::class);

        Route::get("/role/edit", [RoleController::class, "edit"]);
        Route::put("/edit/simpan", [RoleController::class, "update"]);
        Route::resource("role", RoleController::class);
    });
});
