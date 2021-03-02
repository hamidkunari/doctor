

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.component('pagination', require('laravel-vue-pagination'));


// Router Imported
import {routes} from './routes';

//import user class
import User from './Helpers/User';
window.User  = User;

//start sweetalert2
import Swal from 'sweetalert2'
window.Swal  = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast  = Toast;



//end sweet alert

const router = new VueRouter({
  routes,
  mode: 'history'
})


const app = new Vue({
    el: '#app',
    router
});
