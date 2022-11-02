<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\blog\ArtikelSeeder;
use Database\Seeders\blog\ArtikelTagSeeder;
use Database\Seeders\blog\KategoriSeeder;
use Database\Seeders\components\CarouselSeeder;
use Database\Seeders\components\ChooseUsSeeder;
use Database\Seeders\components\ProfilPerusahaanSeeder;
use Database\Seeders\components\QuestionSeeder;
use Database\Seeders\components\ServiceSeeder;
use Database\Seeders\components\TagSeeder;
use Database\Seeders\components\TentangKamiSeeder;
use Database\Seeders\components\TestimonialSeeder;
use Database\Seeders\Jasa\BenefitJasaSeeder;
use Database\Seeders\Jasa\HasilJasaProdukSeeder;
use Database\Seeders\Jasa\KategoriJasaSeeder;
use Database\Seeders\Jasa\KategoriPaketSeeder;
use Database\Seeders\Jasa\PaketJasaSeeder;
use Database\Seeders\Jasa\ProdukPaketSeeder;
use Database\Seeders\selengkapnya\KebijakanPrivasiSeeder;
use Database\Seeders\selengkapnya\SyaratKetentuanSeeder;
use Database\Seeders\step\BookingOnlineSeeder;
use Database\Seeders\Transaksi\KodeTokenSeeder;
use Database\Seeders\transaksi\ProdukSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServiceSeeder::class);
        $this->call(TentangKamiSeeder::class);
        $this->call(ProfilPerusahaanSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CarouselSeeder::class);
        $this->call(ChooseUsSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(ArtikelSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ArtikelTagSeeder::class);
        $this->call(SyaratKetentuanSeeder::class);
        $this->call(BookingOnlineSeeder::class);
        $this->call(KebijakanPrivasiSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(KategoriJasaSeeder::class);
        $this->call(KategoriPaketSeeder::class);
        $this->call(PaketJasaSeeder::class);
        $this->call(ProdukPaketSeeder::class);
        $this->call(BenefitJasaSeeder::class);
        $this->call(HasilJasaProdukSeeder::class);
        $this->call(KodeTokenSeeder::class);
        $this->call(PortfolioSeeder::class);
    }
}
