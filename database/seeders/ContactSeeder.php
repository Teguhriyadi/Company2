<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'deskripsi_cp' => 'Perencanaan Strategi',
            'judul_cp' => 'Perusahaan IT yang bergerak di bidang jasa Penyedia sistem aplikasi & Pengembangan software house yang sudah bekerja sama dengan Bank-Bank Besar.',
        ]);
    }
}
