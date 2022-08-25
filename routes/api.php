<?php

use App\Http\Controllers\API\CarouselController;
use App\Http\Controllers\API\JasaController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\PesanController;
use App\Http\Controllers\API\ProfilPerusahaanController;
use App\Http\Controllers\API\TeamController;
use App\Http\Controllers\Master\PartnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('profil_perusahaan', ProfilPerusahaanController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('carousel', CarouselController::class);
Route::resource('team', TeamController::class);
Route::post('pesan', [PesanController::class, "store"]);
Route::resource('jasa', JasaController::class);
Route::resource('partner', PartnerController::class);
