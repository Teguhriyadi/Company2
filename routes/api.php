<?php

use App\Http\Controllers\API\AboutUsController;
use App\Http\Controllers\API\CarouselController;
use App\Http\Controllers\API\JasaController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\PesanController;
use App\Http\Controllers\API\ProfilPerusahaanController;
use App\Http\Controllers\API\TeamController;
use App\Http\Controllers\API\WorkController;
use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\ApiContactController;
use App\Http\Controllers\API\ApiFooterController;
use App\Http\Controllers\API\ApiLayananController;
use App\Http\Controllers\API\ApiProdukController;
use App\Http\Controllers\API\ApiTentangKamiController;
use App\Http\Controllers\API\PortfolioController;
use App\Http\Controllers\API\ServicesController;
use App\Http\Controllers\API\TargetController;
// use App\Http\Controllers\API\ApiCarouselController;
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
Route::resource('work', WorkController::class);
Route::resource('target', TargetController::class);
Route::resource('services', ServicesController::class);
Route::resource('portfolio', PortfolioController::class);
Route::resource('tentang_kami', AboutUsController::class);

Route::prefix('contacts')->group(function () {
    Route::controller(ApiContactController::class)->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'detail');
        Route::post('', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});



Route::prefix('layanan')->group(function () {
    Route::controller(ApiLayananController::class)->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'detail');
        Route::post('', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});


Route::prefix('produk')->group(function () {
    Route::controller(ApiProdukController::class)->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'detail');
        Route::post('', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});



Route::prefix('tentang')->group(function () {
    Route::controller(ApiTentangKamiController::class)->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'detail');
        Route::post('', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});



Route::prefix('footer')->group(function () {
    Route::controller(ApiFooterController::class)->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'detail');
        Route::post('', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});



Route::prefix('carousel')->group(function () {
    Route::controller(ApiCarouselController::class)->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'detail');
        Route::post('', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});
