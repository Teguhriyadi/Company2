import './bootstrap';

import { createWebHistory, createRouter } from "vue-router";
import {createApp} from 'vue'
import VueSweetAlert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css';
import axios from "axios"
import App from './src/App.vue'
import VPagination from "@hennge/vue3-pagination"
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
import Home from "@/views/Home.vue";
import Portofolio from "@/views/components/karya/Portofolio.vue"
import DetailBlog from "@/views/components/artikel/DetailArtikel.vue"
import Kategori from "@/views/components/artikel/Kategori.vue"
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
import NotFound from "@/views/components/page/NotFound.vue"
import AllBlog from "@/views/components/artikel/AllArtikel.vue"

const routes = [
    {
        path: "/:catchAll(.*)",
        component: NotFound
    },

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
        path: "/portofolio/:slug",
        name: 'portofolio',
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
        path: "/cart/:produk_id/:encrypt",
        name: "cart",
        component: Cart
    },
    {
        path: "/checkout/:encrypt/:id_cart",
        name: "checkout",
        component: DetailCart
    },
    {
        path: "/history",
        name: 'history',
        component: History
    },
    {
        path: "/profil_saya",
        component: ProfilSaya
    },
    {
        path: "/all-blog",
        component: AllBlog
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "active"
});

axios.defaults.baseURL = "http://kumon.startsheep.my.id/api/"
const apiData = localStorage.getItem("api_data");

if (apiData == null) {
    axios.get("data_api", {
        headers: {
            'Authorization': 'Bearer ' + apiData
        }
    }).then(response => {
        localStorage.setItem("api_data", response.data.token);
    });
}

const token = localStorage.getItem("token");
if (token) {
    axios.defaults.headers.common["Authorization"] = token
}

const rendering = createApp(App)

rendering.component("v-pagination",VPagination)

rendering.use(VueSweetAlert2);
rendering.use(router);

rendering.mount("#app");
