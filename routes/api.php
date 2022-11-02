<?php

use App\Http\Controllers\API\AboutUsController;
use App\Http\Controllers\API\CarouselController;
use App\Http\Controllers\API\ContactUsController;
use App\Http\Controllers\API\JasaController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\PesanController;
use App\Http\Controllers\API\ProfilPerusahaanController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\ArtikelController;
use App\Http\Controllers\API\Autentikasi\LoginController;
use App\Http\Controllers\API\ChooseUsController;
use App\Http\Controllers\API\Jasa\ProdukPaketController;
use App\Http\Controllers\API\Master\BookingOnlineController;
use App\Http\Controllers\API\Master\Jasa\BenefitController;
use App\Http\Controllers\API\Master\Jasa\HasilProdukJasaController;
use App\Http\Controllers\API\Master\Jasa\KategoriJasaController;
use App\Http\Controllers\API\Master\Jasa\PaketJasaController;
use App\Http\Controllers\API\Master\PortofolioController;
use App\Http\Controllers\API\Master\ProdukController;
use App\Http\Controllers\API\Master\QuestionController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\Pengaturan\SyaratKetentuanController;
use App\Http\Controllers\API\ServicesController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\Pengaturan\KebijakanPrivasiController;
use App\Http\Controllers\API\Transaksi\HistoryPemesananController;
use App\Http\Controllers\API\Transaksi\JasaTokenController;
use App\Http\Controllers\API\Transaksi\KeranjangController;
use App\Http\Controllers\API\Transaksi\KodeTokenController;
use App\Http\Controllers\API\Transaksi\PaymentController as TransaksiPaymentController;
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
Route::middleware("auth:sanctum")->get("/user", function(Request $request) {
    return $request->user();
});

Route::post("/login", [LoginController::class, "index"]);
Route::post("/register", [LoginController::class, "register"]);
Route::get("/logout", [LoginController::class, "logout"]);

Route::resource("testimonial", TestimonialController::class);
Route::post("contact_us", [ContactUsController::class, "store"]);
Route::resource('profil_perusahaan', ProfilPerusahaanController::class);
Route::get('kategori/{slug}', [KategoriController::class, "filter"]);
Route::resource('kategori', KategoriController::class);
Route::resource('carousel', CarouselController::class);
Route::post('pesan', [PesanController::class, "store"]);
Route::resource('jasa', JasaController::class);
Route::resource('partner', PartnerController::class);
Route::resource('services', ServicesController::class);
Route::resource('choose_us', ChooseUsController::class);
Route::resource('portofolio', PortofolioController::class);
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
Route::get("/produk/filter/{id}", [ProdukController::class, "index"]);

Route::get("/kategori_jasa/{slug}", [KategoriJasaController::class, "detail"]);
Route::resource("kategori_jasa", KategoriJasaController::class);
Route::get("paket_jasa/{slug}", [PaketJasaController::class, "index"]);
Route::post("payment", [PaymentController::class, "handler"]);

Route::get("/produk_paket/detail/{slug}", [ProdukPaketController::class, "detail_produk_paket"]);
Route::resource("produk_paket", ProdukPaketController::class);

Route::get("/benefit", [BenefitController::class, "index"]);
Route::get("/benefit/{produk_id}", [BenefitController::class, "detail"]);
Route::get("/hasil_jasa/{produk_id}", [HasilProdukJasaController::class, "index"]);

Route::post("/keranjang", [KeranjangController::class, "keranjang"]);
Route::get("/payment/{id_cart}", [TransaksiPaymentController::class, "index"]);
Route::post("/payment", [TransaksiPaymentController::class, "store"]);

Route::get("/history/{user_id}", [HistoryPemesananController::class, "index"]);
Route::post("/generate", [KodeTokenController::class, "index"]);
Route::post("/jasa_token", [JasaTokenController::class, "store"]);
