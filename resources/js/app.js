import './bootstrap';

import {createApp} from 'vue'
import VueRouter from 'vue-router'

import axios from 'axios'
import Main from './Main.vue'

axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
createApp(Main).mount("#app")

var nav = document.querySelector('nav');

window.addEventListener('scroll', function() {
	if (window.pageYOffset > 100) {
		nav.classList.add('bg-dark', 'shadow');
	} else {
		nav.classList.remove('bg-dark', 'shadow');
	}
});
