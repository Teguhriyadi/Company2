
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            @php
                use App\Models\Pengaturan\ProfilPerusahaan;

                $data_profil = ProfilPerusahaan::first();

            @endphp
            {{ empty($data_profil) ? '' : $data_profil->profil_nama }}
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item {{ Request::segment(2) == 'master' ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true"
            aria-controls="master">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
        </a>
        <div id="master" class="collapse {{ Request::segment(2) == 'master' ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/master/kategori') ? 'active' : '' }}"
                    href="{{ url('/admin/master/kategori') }}">
                    Kategori
                </a>
                <a class="collapse-item {{ Request::is('admin/master/tag') ? 'active' : '' }}" href="{{ url('/admin/master/tag') }}">
                    Tag
                </a>
                <a class="collapse-item {{ Request::is('admin/master/services') ? 'active' : '' }}"
                    href="{{ url('/admin/master/services') }}">
                    Jasa
                </a>
                <a class="collapse-item {{ Request::is('admin/master/carousel') ? 'active' : '' }}"
                    href="{{ url('/admin/master/carousel') }}">
                    Carousel
                </a>
                <a class="collapse-item {{ Request::is('admin/master/choose_us') ? 'active' : '' }}"
                    href="{{ url('/admin/master/choose_us') }}">
                    Choose Us
                </a>
                <a class="collapse-item {{ Request::is('admin/master/artikel') ? 'active' : '' }}"
                    href="{{ url('/admin/master/artikel') }}">
                    Artikel
                </a>
                <a class="collapse-item {{ Request::is('admin/master/question') ? 'active' : '' }}"
                    href="{{ url('/admin/master/question') }}">
                    Question
                </a>
                <a class="collapse-item {{ Request::is('admin/master/kategori_jasa') ? 'active' : '' }}"
                    href="{{ url('/admin/master/kategori_jasa') }}">
                    Kategori Jasa
                </a>
                <a class="collapse-item {{ Request::is('admin/master/paket_kategori') ? 'active' : '' }}"
                    href="{{ url('/admin/master/paket_kategori') }}">
                    Paket Kategori
                </a>
                <a class="collapse-item {{ Request::is('admin/master/paket_jasa') ? 'active' : '' }}" href="{{ url('/admin/master/paket_jasa') }}">
                    Paket Jasa
                </a>
                <a class="collapse-item {{ Request::is('admin/master/client') ? 'active' : '' }}"
                    href="{{ url('/admin/master/client') }}">
                    Client
                </a>
                <a class="collapse-item" {{ Request::is('admin/master/portfolio') ? 'active' : '' }}  href="{{ url('/admin/master/portfolio') }}">
                    Portfolio
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::segment(2) == 'production' ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#produk" aria-expanded="true"
            aria-controls="produk">
            <i class="fas fa-fw fa-bars"></i>
            <span>Production</span>
        </a>
        <div id="produk" class="collapse {{ Request::segment(2) == 'production' ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/production/produk') ? 'active' : '' }}"
                    href="{{ url('/admin/production/produk') }}">
                    Produk
                </a>
                <a class="collapse-item {{ Request::is('admin/production/produk_paket') ? 'active' : '' }}"
                    href="{{ url('/admin/production/produk_paket') }}">
                    Produk Paket
                </a>
                <a class="collapse-item {{ Request::is('admin/production/benefit') ? 'active' : '' }}"
                    href="{{ url('/admin/production/benefit') }}">
                    Benefit Produk
                </a>
                <a class="collapse-item {{ Request::is('admin/production/portofolio') ? 'active' : '' }}"
                    href="{{ url('/admin/production/portofolio') }}">
                    Portofolio
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::segment(2) == 'pengaturan' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan"
            aria-expanded="true" aria-controls="pengaturan">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span>
        </a>
        <div id="pengaturan" class="collapse {{ Request::segment(2) == 'pengaturan' ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/pengaturan/syarat_ketentuan') ? 'active' : '' }} " href="{{ url('/admin/pengaturan/syarat_ketentuan') }}">
                    Syarat & Ketentuan
                </a>
                <a class="collapse-item {{ Request::is('admin/pengaturan/tentang_kami') ? 'active' : '' }} " href="{{ url('/admin/pengaturan/tentang_kami') }}">
                    Tentang Kami
                </a>
                <a class="collapse-item {{ Request::is('admin/pengaturan/profil_perusahaan') ? 'active' : '' }}"
                    href="{{ url('/admin/pengaturan/profil_perusahaan') }}">
                    Profil Perusahaan
                </a>
                <a class="collapse-item {{ Request::is('admin/pengaturan/testimonial') ? 'active' : '' }}"
                    href="{{ url('/admin/pengaturan/testimonial') }}">
                    Testimonial
                </a>
                <a class="collapse-item {{ Request::is('admin/pengaturan/pesan') ? 'active' : '' }}"
                    href="{{ url('/admin/pengaturan/pesan') }}">
                    Pesan
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin/aktivasi/token') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/aktivasi/token') }}">
            <i class="fas fa-fw fa-edit"></i>
            <span>Aktivasi</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::segment(2) == 'akun' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Akun</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Request::segment(2) == 'akun' ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/akun/users') ? 'active' : '' }}"
                    href="{{ url('/admin/akun/users') }}">
                    Users
                </a>
                <a class="collapse-item {{ Request::is('admin/akun/role') ? 'active' : '' }}"
                    href="{{ url('/admin/akun/role') }}">
                    Role
                </a>
                <a class="collapse-item {{ Request::is('admin/akun/informasi_login') ? 'active' : '' }}"
                    href="{{ url('/admin/akun/informasi_login') }}">
                    Informasi Login
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
