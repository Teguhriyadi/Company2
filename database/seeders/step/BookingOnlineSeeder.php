<?php

namespace Database\Seeders\step;

use App\Models\Master\BookingOnline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingOnlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookingOnline::create([
            "booking_icon" => "fa fa-pencil",
            "booking_judul" => "Register",
            "booking_deskripsi" => "Jika Anda Belum Mempunyai Akun, Anda Diharuskan Untuk Membuat Akun Terlebih Dahulu."
        ]);

        BookingOnline::create([
            "booking_icon" => "fa fa-edit",
            "booking_judul" => "Login",
            "booking_deskripsi" => "Apabila Anda Sudah Mempunyai Akun, Anda Bisa Langsung Ke Menu Login"
        ]);

        BookingOnline::create([
            "booking_icon" => "fa fa-tag",
            "booking_judul" => "Kategori Jasa",
            "booking_deskripsi" => "Pilih Kategori Jasa Yang Anda Inginkan."
        ]);

        BookingOnline::create([
            "booking_icon" => "fa fa-pencil",
            "booking_judul" => "Isi Form Pemesanan",
            "booking_deskripsi" => "Anda Akan Diberikan Keterangan Lebih Lanjut Sebagai Pendataan Pemesanan"
        ]);

        BookingOnline::create([
            "booking_icon" => "fa fa-money",
            "booking_judul" => "Bayar",
            "booking_deskripsi" => "Jika Sudah, Anda Bisa Memilih Metode Pembayaran Yang Anda Inginkan"
        ]);
    }
}
