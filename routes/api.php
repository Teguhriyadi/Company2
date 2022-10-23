<?php

use App\Http\Controllers\API\AboutUsController;
use App\Http\Controllers\API\CarouselController;
use App\Http\Controllers\API\ContactUsController;
use App\Http\Controllers\API\JasaController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\PesanController;
use App\Http\Controllers\API\ProfilPerusahaanController;
use App\Http\Controllers\API\TeamController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\WorkController;
use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\ArtikelController;
use App\Http\Controllers\API\ChooseUsController;
use App\Http\Controllers\API\Master\BookingOnlineController;
use App\Http\Controllers\API\Master\ProdukController;
use App\Http\Controllers\API\Master\QuestionController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\Pengaturan\SyaratKetentuanController;
use App\Http\Controllers\API\PortfolioController;
use App\Http\Controllers\API\ServicesController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\TargetController;
use App\Http\Controllers\API\Pengaturan\KebijakanPrivasiController;
use App\Http\Controllers\JWT\AutentikasiController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AutentikasiController::class, 'login']);
    Route::post('/register', [AutentikasiController::class, 'register']);
    Route::post('/logout', [AutentikasiController::class, 'logout']);
    Route::post('/refresh', [AutentikasiController::class, 'refresh']);
    Route::get('/user-profile', [AutentikasiController::class, 'userProfile']);
});

Route::resource("testimonial", TestimonialController::class);
Route::post("contact_us", [ContactUsController::class, "store"]);
Route::resource('profil_perusahaan', ProfilPerusahaanController::class);
Route::get('kategori/{slug}', [KategoriController::class, "filter"]);
Route::resource('kategori', KategoriController::class);
Route::resource('carousel', CarouselController::class);
Route::resource('team', TeamController::class);
Route::post('pesan', [PesanController::class, "store"]);
Route::resource('jasa', JasaController::class);
Route::resource('partner', PartnerController::class);
Route::resource('work', WorkController::class);
Route::resource('target', TargetController::class);
Route::resource('services', ServicesController::class);
Route::resource('choose_us', ChooseUsController::class);
Route::resource('portfolio', PortfolioController::class);
Route::resource('tentang_kami', AboutUsController::class);
Route::get("/artikel/{slug}", [ArtikelController::class, "detail"]);
Route::get("/artikel/detail/{slug}", [ArtikelController::class, "artikel"]);
Route::get("/artikel/kategori/{slug_kategori}", [ArtikelController::class, "detail_by_kategori"]);
Route::resource("artikel", ArtikelController::class);
Route::resource("tag", TagController::class);
Route::resource("question", QuestionController::class);
Route::resource("syarat_ketentuan", SyaratKetentuanController::class);
Route::resource("booking_online", BookingOnlineController::class);
Route::resource("kebijakan_privasi", KebijakanPrivasiController::class);
Route::get("/produk/{slug}", [ProdukController::class, "detail_produk"]);
Route::resource("produk", ProdukController::class);

Route::post("payment", [PaymentController::class, "handler"]);
