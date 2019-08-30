    import Vue from 'vue';
    import VueSweetalert2 from 'vue-sweetalert2';
    import Vuex from 'vuex'
    
    Vue.use(Vuex)

    const store = new Vuex.Store({
        state: {
            count: 0
        },
        mutations: {
            setCount(state, value) {
                return state.count = value;
            }
        }
    });


    Vue.use(VueSweetalert2);

    window.axios = require('axios');

    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    /**
     * Next we will register the CSRF Token as a common header with Axios so that
     * all outgoing HTTP requests automatically have it attached. This is just
     * a simple convenience so we don't have to attach every token manually.
     */

    let token = document.head.querySelector('meta[name="csrf-token"]');

    if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }


    Vue.component('cart', require('./cart.vue').default);
    Vue.component('product', require('./product.vue').default);

    Vue.component('count', {
        template: //html
        `
        <a href="/cart"><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{ $store.state.count }}</span></a>
        `,

    });


   

 

    const app = new Vue({
        el: '#app',
        store
    });

    const count = new Vue({
        el: '#count',
        store
    });

    