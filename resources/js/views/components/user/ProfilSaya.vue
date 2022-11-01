<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/theme/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Profil Saya</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        Update Profil Saya
                    </li>
                </ol>
            </div>
        </div>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="card">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                            <img v-if="!user.foto" class="rounded-circle mt-5 img-fluid" style="width: 50%;"
                            :src="user.foto">
                            <img v-else class="rounded-circle mt-5 img-fluid" style="width: 50%;" :src="user.foto">
                            <span class="font-weight-bold">
                                {{ user.first_name }} {{ user.last_name }}
                            </span>
                            <span class="text-black-50">
                                {{ user.email }}
                            </span>
                            <span> </span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form method="POST" @submit.prevent="updateProfil">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">
                                        Informasi Akun Profil Saya
                                    </h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label class="labels">
                                            Nama Depan
                                        </label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Depan Anda" v-model="form.first_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="labels">
                                            Nama Belakang
                                        </label>
                                        <input type="text" class="form-control" v-model="form.last_name" placeholder="Masukkan Nama Belakang Anda">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">
                                            Nomor HP
                                        </label>
                                        <input type="number" class="form-control" placeholder="Masukkan Nomor Anda" value="081214707143">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">
                                            Alamat
                                        </label>
                                        <input type="text" class="form-control" placeholder="Masukkan Alamat Anda" value="Villa Intan 2 Blok i4, No.1. Cirebon, Jawa Barat">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">
                                            Email
                                        </label>
                                        <input type="text" class="form-control" placeholder="Masukkan Email Anda" v-model="form.email" readonly>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="labels">
                                            Kota / Kabupaten
                                        </label>
                                        <input type="text" class="form-control" placeholder="country" value="Kota Cirebon">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="labels">
                                            Kecamatan
                                        </label>
                                        <input type="text" class="form-control" value="Lemahwungkuk" placeholder="state">
                                    </div>
                                </div>
                                <div class="mt-5 mb-5 text-center">
                                    <button type="reset" class="btn btn-danger" style="margin-right: 5px;">
                                        Batal
                                    </button>
                                    <button class="btn btn-success profile-button" type="submit">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios"
export default {
    name: "UpdateProfil",
    data() {
        return {
            loggedIn: localStorage.getItem("loggedIn"),
            token: localStorage.getItem("token"),
            user: [],
            form: {
                first_name: "",
                last_name: "",
                email: ""
            }
        }
    },
    created() {
        axios.get("/user", {
            headers: {
                'Authorization': 'Bearer ' + this.token
            }
        }).then(response => {
            this.user = response.data
            let post = response.data
            this.form = {
                first_name: post.first_name,
                last_name: post.last_name,
                email: post.email
            };
        })
    },
}
</script>
