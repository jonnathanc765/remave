  
  
  window.Vue = require('vue');

  
  Vue.component('counter', require('./counter.vue').default);
 
const app = new Vue({
    el: '#app'
});