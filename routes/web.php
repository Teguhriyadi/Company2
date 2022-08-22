<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\Pengaturan\ProfilPerusahaanController;
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

    Route::prefix("pengaturan")->group(function () {
        Route::resource("profil_perusahaan", ProfilPerusahaanController::class);
    });
});
