<?php

namespace Database\Seeders\blog;

use App\Models\Master\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artikel::create([
            "judul" => "Penggunaan Mode Auto Fokus dan Manual Fokus",
            "slug" => "penggunaan-mode-auto-fokus-dan-manual-fokus",
            "kategori_id" => 1,
            "deskripsi" => "Sebagai Fotografer, anda harus mengetahui waktu terbaik untuk menggunakan auto fokus dan manual fokus. Auto Fokus adalah mode atau fungsi yang terdapat pada kamera untuk membuat fokus secara otomatis. Sedang manual fokus adalah fungsi yang digunakan fotografer untuk menyesuaikan fokus secara manual.",
            "foto" => "https://webdev-id.com/berita/wp-content/uploads/2019/10/auto-fokus.jpg",
            "user_id" => 1
        ]);

        Artikel::create([
            "judul" => "Sejumlah Teknik Fotografi Untuk Hasil Jepretan Yang Estetik",
            "slug" => "sejumlah-teknik-fotografi-untuk-hasil-jepretan-yang-estetik",
            "kategori_id" => 2,
            "deskripsi" => "Ada banyak pertimbangan sebelum mengambil sebuah gambar agar hasilnya memuaskan. Selain itu, teknik fotografi tidak hanya sekedar menekan tombol shutter dan lantas sebuah gambar estetik tercipta begitu saja.",
            "foto" => "https://cdn.eraspace.com/pub/media/mageplaza/blog/post/f/o/fotografiteknik.jpg",
            "user_id" => 1
        ]);

        Artikel::create([
            "judul" => "Begini Perbedaan Videografi dan Sinematografi",
            "slug" => "begini-perbedaan-videografi-dan-sinematografi",
            "kategori_id" => 3,
            "deskripsi" => "Menurut studiobinder, sinematografi adalah sebuah seni dan kerajinan dalam bidang perfilman yang mengemas cerita dan pesan dalam bentuk visual. Seni daripada sinematografi terfokus pada bagaimana merangkai scene menjadi sebuah narasi yang kohesif dan indah. Dengan kata lain, sinematografi adalah ilmu yang berkaitan dengan pengambilan gambar untuk film. Sedangkan videografi adalah suatu proses pengambilan gambar yang bergerak dengan menggunakan hard drive, tape, CD, Blue Ray atau lainnya. Teknik-teknik videografi kurang lebih sama dengan sinematografi, lantas apa yang membuat keduanya berbeda?",
            "foto" => "https://onlyimage.com/uploads/wajib-tahu-begini-perbedaan-videografi-dan-sinematografi.jpg",
            "user_id" => 1
        ]);
    }
}
