require('./bootstrap');

window.Vue = require('vue');
import Swal from 'sweetalert2';
import Vue from 'vue/dist/vue';

// import { Form, HasError, AlertError } from 'vform'

// Vue.component(HasError, HasError);
// Vue.component(AlertError, AlertError);

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);


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
  
// window.Form = Form;
window.Swal = Swal;
window.Toast =  Toast;

const app = new Vue({
    el: '#app',
});
