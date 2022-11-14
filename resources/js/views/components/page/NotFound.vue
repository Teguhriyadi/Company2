<template>
    <main id="header">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/theme/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>
                    404 Not Found
                </h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        404 Not Found
                    </li>
                </ol>
            </div>
        </div>
        <div class="container flex">
            <div class="error">
                <span>
                    Halaman Tidak Ditemukan :)
                </span>
                <p>
                   Sepertinya Halaman Yang Anda Tuju Tidak Ada
                </p>
                <router-link to="/" class="btn btn-sm btn-dark">
                    Kembali Ke Home
                </router-link>
            </div>
            <div class="img">
                <img src="@/assets/image/self.png">
            </div>
        </div>
    </main>
</template>
