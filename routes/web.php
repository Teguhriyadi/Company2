<?php

use App\Http\Controllers\AktivasiTokenController;
use App\Http\Controllers\Akun\RoleController;
use App\Http\Controllers\Akun\UserController;
use App\Http\Controllers\Master\PortfolioController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\Master\ArtikelController;
use App\Http\Controllers\Master\CarouselController;
use App\Http\Controllers\Master\ChooseUsController;
use App\Http\Controllers\Master\ClientController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Master\QuestionController;
use App\Http\Controllers\Master\ServicesController;
use App\Http\Controllers\Master\TagController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Pengaturan\ProfilPerusahaanController;
use App\Http\Controllers\Pengaturan\PesanController;
use App\Http\Controllers\Pengaturan\SyaratKetentuanController;
use App\Http\Controllers\Pengaturan\TestimonialController;
use App\Http\Controllers\Production\PortofolioController;
use App\Http\Controllers\Production\Produk\BenefitProdukController;
use App\Http\Controllers\Production\Produk\ProdukController;
use App\Http\Controllers\Production\Produk\ProdukPaketController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\Web\Jasa\KategoriJasaController;
use App\Http\Controllers\Web\Jasa\PaketJasaController;
use App\Http\Controllers\Web\Jasa\PaketKategoriController;
use App\Http\Controllers\Web\Pengaturan\WhyUsController;
use Illuminate\Support\Facades\Request;
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

// Route::get("/fillable", [AppController::class, "fillable"]);
// Route::post("/fillable", [AppController::class, "post_fillable"]);
Route::get("/payment", [PaymentController::class, "index"]);
Route::post("/payment", [PaymentController::class, "store"]);

    Route::prefix("admin")->group(function () {
        Route::group(["middleware" => ["guest"]], function () {
            Route::get("/login", [LoginController::class, "login"]);
            Route::post("/login", [LoginController::class, "post_login"]);
        });

        Route::group(["middleware" => ["autentikasi"]], function () {
            Route::get("/", [AppController::class, "dashboard"]);
            Route::get("/dashboard", [AppController::class, "dashboard"]);
            Route::prefix("master")->group(function () {

                // Data Kategori
                Route::get("/kategori/edit", [KategoriController::class, "edit"]);
                Route::put("/kategori/simpan", [KategoriController::class, "update"]);
                Route::resource("kategori", KategoriController::class, ['as' => 'kategorii']);
                // END

                // Data Tag
                Route::get("/tag/edit", [TagController::class, "edit"]);
                Route::put("/tag/simpan", [TagController::class, "update"]);
                Route::resource("tag", TagController::class, ['as' => 'tagg']);
                // END

                // Data Jasa
                Route::get("/services/edit", [ServicesController::class, "edit"]);
                Route::put("/services/simpan", [ServicesController::class, "update"]);
                Route::resource("services", ServicesController::class, ['as' => 'servicess']);
                // END

                // Data Carousel
                Route::get("/carousel/edit", [CarouselController::class, "edit"]);
                Route::put("/carousel/simpan", [CarouselController::class, "update"]);
                Route::resource("carousel", CarouselController::class, ['as' => 'carousell']);
                // END

                // Data Choose Us
                Route::get("/choose_us/edit", [ChooseUsController::class, "edit"]);
                Route::put("/choose_us/simpan", [ChooseUsController::class, "update"]);
                Route::resource("choose_us", ChooseUsController::class, ['as' => 'choose_uss']);
                // END

                // Data Artikel
                Route::get("/artikel/edit", [ArtikelController::class, "edit"]);
                Route::put("/artikel/simpan", [ArtikelController::class, "update"]);
                Route::resource("artikel", ArtikelController::class, ['as' => 'artikell']);
                // END

                // Data Artikel
                Route::get("/question/edit", [QuestionController::class, "edit"]);
                Route::put("/question/simpan", [QuestionController::class, "update"]);
                Route::resource("question", QuestionController::class, ['as' => 'questionn']);
                // END

                // Data Kategori Jasa
                Route::resource("kategori_jasa", KategoriJasaController::class, ['as' => 'kategori_jasaa']);
                // END

                // Data Paket Kategori
                Route::resource("paket_kategori", PaketKategoriController::class);
                // END

                // Data Paket Jasa
                Route::resource("paket_jasa", PaketJasaController::class);
                // END

                Route::get("/client/edit", [ClientController::class, "edit"]);
                Route::put("/client/simpan", [ClientController::class, "update"]);
                Route::put("/client/non_aktifkan/{id}", [ClientController::class, "non_aktifkan"]);
                Route::put("/client/aktifkan/{id}", [ClientController::class, "aktifkan"]);
                Route::resource("client", ClientController::class, ['as' => 'clientt']);

                // Data Portofolio
                Route::get("/portfolio/edit", [PortfolioController::class, "edit"]);
                Route::resource("portfolio", PortfolioController::class, ['as' => 'postofolioo']);
                // END
            });

            Route::prefix("production")->group(function() {

                Route::resource("produk", ProdukController::class);
                Route::resource("produk_paket", ProdukPaketController::class, ['as' => 'produk_pakett']);
                Route::resource("benefit", BenefitProdukController::class);
                Route::resource("portofolio", PortofolioController::class);

            });

            Route::prefix("pengaturan")->group(function () {

                // Data Syarat Ketentuan
                Route::get("/syarat_ketentuan/edit", [SyaratKetentuanController::class, "edit"]);
                Route::put("/syarat_ketentuan/simpan", [SyaratKetentuanController::class, "update"]);
                Route::resource("syarat_ketentuan", SyaratKetentuanController::class, ['as' => 'syarat_ketentuann']);
                // END

                Route::resource("tentang_kami", TentangKamiController::class, ['as' => 'tentang_kamii']);
                Route::resource("profil_perusahaan", ProfilPerusahaanController::class, ['as' => 'profil_perusahaann']);
                Route::post("/why_us/upload_gambar", [WhyUsController::class, "upload_gambar"]);
                Route::resource("why_us", WhyUsController::class, ['as' => 'why_uss']);
                Route::resource("testimonial", TestimonialController::class, ['as' => 'tertimoniall']);
                Route::resource("pesan", PesanController::class, ['as' => 'pesann']);
            });

            Route::prefix("aktivasi")->group(function() {
                Route::resource("token", AktivasiTokenController::class);
            });

            Route::prefix("akun")->group(function () {

                Route::get("/users/edit", [UserController::class, "edit"]);
                Route::put("/users/simpan", [UserController::class, "update"]);
                Route::put("/users/non_aktifkan/{id}", [UserController::class, "non_aktifkan"]);
                Route::put("/users/aktifkan/{id}", [UserController::class, "aktifkan"]);
                Route::resource("users", UserController::class);

                Route::get("/role/edit", [RoleController::class, "edit"]);
                Route::put("/edit/simpan", [RoleController::class, "update"]);
                Route::resource("role", RoleController::class);

                Route::get("informasi_login", [AppController::class, "informasi_login"]);
            });

            Route::get("logout", [LoginController::class, "logout"]);
        });
    });

Route::any("/{any}", function() {
    return view("app");
})->where("any", "^(?!admin).*$");
