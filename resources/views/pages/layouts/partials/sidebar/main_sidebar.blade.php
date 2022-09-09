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

    <li class="nav-item active">
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

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true"
            aria-controls="master">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
        </a>
        <div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/master/kategori') }}">
                    Kategori
                </a>
                <a class="collapse-item" href="{{ url('/admin/master/services') }}">
                    Jasa
                </a>
                <a class="collapse-item" href="{{ url('/admin/master/client') }}">
                    Client
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan"
            aria-expanded="true" aria-controls="pengaturan">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span>
        </a>
        <div id="pengaturan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/pengaturan/profil_perusahaan') }}">
                    Profil Perusahaan
                </a>
                <a class="collapse-item" href="{{ url('/admin/pengaturan/team') }}">
                    Team
                </a>
                <a class="collapse-item" href="{{ url('/admin/pengaturan/testimonial') }}">
                    Testimonial
                </a>
                <a class="collapse-item" href="{{ url('/admin/pengaturan/pesan') }}">
                    Pesan
                </a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Akun</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/akun/users') }}">
                    Users
                </a>
                <a class="collapse-item" href="{{ url('/admin/akun/role') }}">
                    Role
                </a>
                <a class="collapse-item" href="{{ url('/admin/akun/informasi_login') }}">
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
