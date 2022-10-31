import './bootstrap';

import { createWebHistory, createRouter } from "vue-router";
import {createApp} from 'vue'
import axios from "axios"
import App from './src/App.vue'

import Home from "@/views/Home.vue";
import Portofolio from "@/views/components/PortofolioComponent.vue"
import DetailBlog from "@/views/components/DetailBlogComponent.vue"
import ArtikelBlog from "@/views/components/ArtikelBlogComponent.vue"
import Kategori from "@/views/components/KategoriComponent.vue"
import FilterKategori from "@/views/components/FilterKategoriComponent.vue"
import SyaratKetentuan from "@/views/components/selengkapnya/SyaratKetentuan.vue"
import BookingOnline from "@/views/components/BookingOnlineComponent.vue"
import KebijakanPrivasi from "@/views/components/selengkapnya/KebijakanPrivasi.vue"
import ProductDetail from "@/views/components/ProductDetailComponent.vue"
import Login from "@/views/components/autentikasi/Login.vue"
import Register from "@/views/components/autentikasi/Register.vue"
import KategoriJasa from "@/views/components/KategoriJasa/KategoriJasaComponent.vue"
import DetailKategoriJasa from "@/views/components/KategoriJasa/DetailKategoriJasaComponent.vue"
import Cart from "@/views/components/Transaksi/Cart.vue"
import DetailCart from "@/views/components/Transaksi/DetailCart.vue"
import History from "@/views/components/Transaksi/HistoryBelanja.vue"
import ProfilSaya from "@/views/components/user/ProfilSaya.vue"

const routes = [
    {
        path: "/",
        component: Home,
    },
    {
        path: "/blog/:slug",
        name: 'blog',
        component: DetailBlog
    },
    {
        path: "/blog/:slug",
        name: 'detailBlog',
        component: ArtikelBlog
    },
    {
        path: "/kategori/:slug",
        name: 'detailKategori',
        component: Kategori
    },
    {
        path: "/jasa/:slug",
        name: "kategoriJasa",
        component: KategoriJasa
    },
    {
        path: "/jasa/detail/:slug",
        name: "detailPaketJasa",
        component: DetailKategoriJasa
    },
    {
        path: "/kategori/:slug",
        name: 'filterKategori',
        component: FilterKategori
    },
    {
        path: "/portofolio",
        component: Portofolio
    },
    {
        path: "/produk/:slug",
        name: "produkDetail",
        component: ProductDetail
    },
    {
        path: "/booking_online",
        component: BookingOnline
    },
    {
        path: "/syarat_ketentuan",
        component: SyaratKetentuan
    },
    {
        path: "/kebijakan_privasi",
        component: KebijakanPrivasi
    },
    {
        path: "/login",
        component: Login
    },
    {
        path: "/daftar",
        component: Register
    },
    {
        path: "/cart",
        name: "cart",
        component: Cart
    },
    {
        path: "/cart_detail",
        name: "cart_detail",
        component: DetailCart
    },
    {
        path: "/history_belanja",
        name: 'history',
        component: History
    },
    {
        path: "/profil_saya",
        component: ProfilSaya
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "active"
});

axios.defaults.withCredentials = true
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const token = localStorage.getItem("token");
if (token) {
    axios.defaults.headers.common["Authorization"] = token
}

createApp(App).use(router).mount("#app")
